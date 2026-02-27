<?php
    require_once 'includes/config.php';
    require_once 'includes/Database.php';
    require_once 'includes/User.php';
    require_once 'includes/Session.php';
    require_once 'Templates/header.php';
    Session::start();
    if(Session::isLoggedIn()){
        header('Location: dashboard.php');
        exit;
    }
    $error = '';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        //form data
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $db_connection = Database::getInstance()->getConnection();
        $user = new User($db_connection);
        $logged_in_user = $user->login($username, $password);
        if($logged_in_user) {
            //set session variables
            Session::set('user_id', $logged_in_user['id']);
            Session::set('username', $logged_in_user['username']);
            header('Location: dashboard.php');
            exit;
        } else{
            $error = "Invalid username or password";
        }
    }
?>

<div class="form-container">
    <h1>Login</h1>
    <?php if(!empty($error)): ?>
    <div class="error-danger">
        <?php echo htmlspecialchars($error); ?>
    </div>
    <?php endif; ?>
    <form action="login.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <p><a href="register.php">Don't have an account? Register</a></p>
</div>
<?php require_once 'Templates/footer.php'; ?>