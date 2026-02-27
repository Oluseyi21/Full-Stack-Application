<?php
//include our configure file

require_once 'config.php';

class Database
{
    private static $instance = null;
    //PDO connection
    private $conn;
    //public property to store any error
    private $error = null;
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $name = DB_NAME;

    private function __construct()
    {
        $dsn = "mysql:host={$this->host};dbname={$this->name};charset=utf8";
        $options = [
            PDO::ATTR_PERSISTENT => false,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        try {
            $this->conn = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    //static method to ensure only one instance exists
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
    //image validation and uploads

    /**
     * Validates and uploads a product image
     * @param array $fileData , $_FILES array data for image input
     * @return string | false returns the new image path on success and false on failure
     */
    private function validateImage(array $fileData){
        //check if an image is uploaded
        if (empty($fileData['name'])) {
            $this->error = "Please select an image.";
            return false;
        }
        //get file properties
        $fileName = $fileData['name'];
        $fileTmpName = $fileData['tmp_name'];
        $fileSize = $fileData['size'];
        $fileError = $fileData['error'];
        // check for uploads error
        if ($fileError !== 0) {
            $this->error = "Error uploading file.";
            return false;
        }
        //define allowed types
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        if (!in_array($fileExtension, $allowed)) {
            $this->error = "File type not allowed.";
            return false;
        }
        //set a max size
        if ($fileSize > 2 * 1024 * 1024) {
            $this->error = "Image must be under 2MB.";
            return false;
        }
        //create a unique file name
        $newFileName = uniqid('', true) . '.' . $fileExtension;
        $fileDestination = 'images/' . $newFileName;
        //move uploaded file
        if (!move_uploaded_file($fileTmpName, $fileDestination)) {
            $this->error = "Error uploading file.";
            return false;
        }
        return $fileDestination;
    }

    // create products
    public function create($name, $description, $price, $fileData){
        //validate and upload using a private method
        $imagePath = $this->validateImage($fileData);
        //if validation fail stop and return false
        if ($imagePath === false) {
            return false;
        }
        //prepare sql insert statements
        try {
            $sql = "INSERT INTO products(name, description, price, image_path) VALUES(:name, :description, :price, :image_path)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image_path', $imagePath);
            // fire the statements
            return $stmt->execute();
        } catch (PDOException $e) {
            $this->error = "Database Error: " . $e->getMessage();
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            return false;
        }
    }

    /**
     * read products
     */
    public function getProducts(){
        try {
            //store SQL select statements
            $sql = "SELECT * FROM products ORDER BY id DESC";
            // execute query
            $stmt = $this->conn->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            $this->error = "Database Error: " . $e->getMessage();
            return false;
        }
    }

    /**
     * read single product
     */
    public function getProduct($id){
        try {
            $sql = "SELECT * FROM products WHERE id = :id LIMIT 1";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            $this->error = "Database Error: " . $e->getMessage();
            echo "PDO ERROR: " . $e->getMessage();
            return false;
        }
    }

    /**
     * Update
     */
    public function updateProduct($id, $name, $description, $price, $fileData){
        $imagePath = null;
        if (!empty($fileData['name'])) {
            $imagePath = $this->validateImage($fileData);
            if ($imagePath === false) {
                return false;
            }
        }
        try {
            if ($imagePath) {
                $sql = "UPDATE products SET name = :name, description = :description, price = :price, image_path = :image_path WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':image_path', $imagePath);
                $stmt->bindParam(':id', $id);
            } else {
                $sql = "UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id";
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':name', $name);
                $stmt->bindParam(':description', $description);
                $stmt->bindParam(':price', $price);
                $stmt->bindParam(':id', $id);
            }
            return $stmt->execute();
        } catch (PDOException $e) {
            $this->error = "Database Error: " . $e->getMessage();
            if (!empty($imagePath) && file_exists($imagePath)) {
                unlink($imagePath);
            }
            return false;
        }
    }

    /*
     * Delete
     */
    public function deleteProduct($id){
        try {
            $sql = "DELETE FROM products WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $result = $stmt->execute([':id' => $id]);
            return $result;
        } catch (PDOException $e) {
            $this->error = "Database Error: " . $e->getMessage();
            return false;
        }
    }
}

$db = Database::getInstance()->getConnection();
?>