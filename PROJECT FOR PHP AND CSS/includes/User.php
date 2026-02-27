<?php

class User{
    private $db;

    public function __construct($db_connection){
        $this->db = $db_connection;
    }

    /**
     * Find a user by username
     * @param string $username
     * @return mixed user data as array or false if not found
     */
    public function findByUsername($username){
        try {
            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            return $stmt->fetch();
        } catch (PDOException $e) {
            return false;
        }
    }

    /**
     * Register a new user
     * @param string $username
     * @param string $password
     * @param string $confirm_password
     * @return string success or error message
     */
    public function register($username, $password, $confirm_password){
        //basic validation
        if (empty($username) || empty($password) || empty($confirm_password)) {
            return "All fields are required";
        }
        // confirm password validation
        if ($password !== $confirm_password) {
            return "Passwords do not match";
        }
        // check if the username already exists
        if ($this->findByUsername($username)) {
            return "Username already exists";
        }
        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        try {
            $stmt = $this->db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
            $stmt->execute([$username, $hashed_password]);
            return "User created";
        } catch (PDOException $e) {
            return "Could not create user: " . $e->getMessage();
        }
    }

    /**
     * login a user
     * @param string $username
     * @param string $password
     * @return mixed user data array on success and false on failure
     */
    public function login($username, $password){
        if (empty($username) || empty($password)) {
            return false;
        }
        // find the user
        $user = $this->findByUsername($username);
        // verify password
        if ($user && password_verify($password, $user['password'])) {
            //successful login
            return $user;
        } else {
            return false;
        }
    }
}
?>