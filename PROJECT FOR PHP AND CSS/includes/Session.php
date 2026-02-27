<?php

class Session{
    // start session only if the session is not already active
    public static function start(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    // session key/value
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    //session value safety
    public static function get($key){
        return isset($_SESSION['user_id']) ? $_SESSION[$key] : null;
    }

    //checks if the user is logged in
    public static function isLoggedIn(){
        return isset($_SESSION['user_id']);
    }

    // destroy the session
    public static function destroy(){
        session_unset();
        session_destroy();
    }
}

?>