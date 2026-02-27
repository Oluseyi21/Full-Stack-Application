<?php
    require_once 'includes/Session.php';
    Session::start();
    Session::destroy();
    header('Location: login.php');
    exit;
?>