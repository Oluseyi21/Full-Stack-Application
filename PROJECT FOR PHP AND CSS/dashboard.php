<?php
require_once 'includes/Session.php';
require_once 'Templates/header.php';
//First check if the user is logged in
if(!Session::isLoggedIn()){
    header("Location: login.php");
    exit;
}
//retrieve the username
$username = Session::get("username");
?>
<div class="row">
    <div class="col-12">
        <div class="card">
<div class="card-header">
    <h2>Dashboard</h2>
</div>
<div class="card-body">
    <h5 class="card-title">Welcome, <?php echo htmlspecialchars($username); ?>!</h5>
    <p class="card-text">You have successfully logged in.</p>
    <a href="logout.php" class="btn-logout">Logout</a>
</div>
</div>
</div>
</div>
<?php require_once 'Templates/footer.php'; ?>