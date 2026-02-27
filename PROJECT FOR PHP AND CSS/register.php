<?php
    require_once 'includes/config.php';
    require_once 'includes/Session.php';
    require_once 'includes/Database.php';
    require_once 'includes/User.php';
    require_once 'Templates/header.php';
    Session::start();
    // redirect user if logged in
if(Session::isLoggedIn()){
    header('Location: dashboard.php');
    exit;
}
$message = '';
$message_type = '';
// form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // get DB connection
    $db_connection = Database::getInstance()->getConnection();
    $user = new User($db_connection);
    //form fields
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $message = $user->register($username, $password, $confirm_password);
    // check to see if a user was created
    if ($message === "User created"){
        $message_type = "success";
    } else {
        $message_type = "danger";
    }
}
?>
<div class="form-container">
    <h2>Register</h2>
</div>
<div class="card-body">
    <?php if($message): ?>
    <div class="message <?php echo $message_type; ?>">
        <?php echo htmlspecialchars($message); ?>
    </div>
    <?php endif; ?>

    <form action="register.php" method="POST">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        <button type="submit" class="btn-submit">Register</button>
    </form>
    <a href="login.php">Already have an account? Login</a>
</div>
<?php require_once 'Templates/footer.php'; ?>