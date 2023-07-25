<?php
// Session Start
session_start();

    // with out login page
    if( isset( $_SESSION['name'] ) ) {
        header('location: index.php');
    }
?>

<?php
// Header
include_once('include/header.php');
?>

<!-- Html -->
<div class="login">
    <div class="container">
        <div class="row">
            <div class="login-form col-md-12">

                <?php
                if (isset($_SESSION['insert_data'])) {
                ?>
                    <div class="alert alert-success">
                        <strong>Success!</strong> <?php echo $_SESSION['insert_data']; ?>
                    </div>
                <?php
                }
                ?>

                <?php
                if (isset($_SESSION['login_error'])) {
                ?>
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> <?php echo $_SESSION['login_error']; ?>
                    </div>
                <?php
                }
                ?>

                <h2>Login</h2>
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
                    <input type="submit" value="Login" name="login" class="form-control">
                </form>
                <div class="mt-3">
                    <a href="#" class="btn btn-info me-3">Forgotten</a>
                    <a href="registration.php" class="btn btn-info ms-3">Registration</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
// Footer
include_once('include/footer.php');
?>

<?php
// Unset Session
unset($_SESSION['insert_data']);
unset($_SESSION['login_error']);
//echo phpinfo();
?>