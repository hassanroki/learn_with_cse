<?php
    // Session Start
    session_start();
?>

<?php
// Header
include_once('include/header.php');
?>

<!-- Html -->
<div class="registration">
    <div class="container">
        <div class="row">

        <?php
            if( isset( $_SESSION['email_exits'] ) ) {
                ?>
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> <?php echo $_SESSION['email_exits']; ?>
                    </div>
                <?php
            }
        ?>

        <?php
            if( isset( $_SESSION['password_wrong'] ) ) {
                ?>
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> <?php echo $_SESSION['password_wrong']; ?>
                    </div>
                <?php
            }
        ?>

        <?php
            if( isset( $_SESSION['insert_error'] ) ) {
                ?>
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> <?php echo $_SESSION['insert_error']; ?>
                    </div>
                <?php
            }
        ?>

            <h4 class="text-center">Users Registration Form</h4>
            <hr>
            <form action="registrationStore.php" class="form" method="post">
                <div class="mt-3">
                    <label for="usersName" class="form-label">Users Name</label>
                    <input type="text" name="usersName" id="usersName" class="form-control" placeholder="Enter Your usersName" required>
                </div>
                <div class="mt-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email">
                </div>
                <div class="mt-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                </div>
                <div class="mt-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Enter Confirm Password">
                </div>
                <input type="submit" value="Registration" name="registration" class="">
            </form>
            <a href="" class="btn btn-info mt-3">Already Registration!</a>
        </div>
    </div>
</div>

<?php
// Footer
include_once('include/footer.php');
?>

<?php
    // Unset Session
    unset( $_SESSION['email_exits'] );
    unset( $_SESSION['password_wrong'] );
    unset( $_SESSION['insert_error'] );
?>