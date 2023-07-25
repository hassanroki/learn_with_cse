<?php
// Session Start
session_start();

// with out login
if( isset( $_SESSION['login_success'] ) ) {
    header('location: index.php');
}
?>

<?php
// Header
include_once('include/headerCssFonts.php');
?>

<!-- Html -->
<div class="login">
    <div class="container">
        <div class="row">
            <h2 class="text-center">Welcome to Learn with CSE</h2>
            <?php
            if (isset($_SESSION['login_error'])) {
            ?>
                <div class="alert alert-warning">
                    <strong>Warning!</strong> <?php echo $_SESSION['login_error']; ?>
                </div>
            <?php
            }
            ?>
            <div class="d-flex justify-content-center py-3">
                <a href="<?php echo $url; ?>index.php"><img src="../asset/img/logo.png" alt="logo" class="img-fluid rounded"></a>
            </div>
            <div class="login-form col-md-12 class-table">
                <h4 class="text-center">Admin Panel</h4>
                <hr>
                <form action="loginConfirm.php" class="form" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">User Name/Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter User Name/Email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                    </div>
                    <input type="submit" value="Login" name="login" class="form-control bg-danger">
                </form>
            </div>
        </div>
    </div>
</div>
<hr>
<p class="text-center">Copyright © 2023 - All Rights Reserved - Learn with CSE</p>

<?php
// Footer
include_once('include/footerJs.php');
?>

<?php
// Unset Session
unset($_SESSION['login_error']);
?>