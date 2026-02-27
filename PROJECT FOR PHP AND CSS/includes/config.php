<?php
    //Database Connection
    //define our database connection
define('DB_HOST', '172.31.22.43');
define('DB_USER', 'Oluseyi200616929');
define('DB_PASS', '0GppqdnJwS');
define('DB_NAME', 'Oluseyi200616929');

try{
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    //if connection fails stop script and display the error
    die("Connection failed: " . $e->getMessage());
}
?>