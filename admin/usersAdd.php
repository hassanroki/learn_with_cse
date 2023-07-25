<?php
    // Session Start
    session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header CSS & Fonts
include_once('include/header.php');
?>

<!-- Html -->
<div class="col-md-9">
    <div class="box-shadow submit-button users">
        <a href="users.php" class="btn btn-info px-3">Users List</a>
        <hr>
        <h2 class="text-center">Add New Users</h2>

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
            if( isset( $_SESSION['email_error'] ) ) {
                ?>
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> <?php echo $_SESSION['email_error']; ?>
                    </div>
                <?php
            }
        ?>

        <?php
            if( isset( $_SESSION['insert_fail'] ) ) {
                ?>
                    <div class="alert alert-warning">
                        <strong>Warning!</strong> <?php echo $_SESSION['insert_fail']; ?>
                    </div>
                <?php
            }
        ?>

        <form action="usersStore.php" class="form" method="post">
            <div class="mt-3">
                <label for="roles_id" class="form-label">Roles Id</label>
                <input type="text" class="form-control" name="roles_id" id="roles_id" placeholder="Enter Roles Id (ex: admin = 1, student = 2, teachers = 3, general users = 4)">
            </div>
            <div class="mt-3">
                <label for="name" class="form-label">Users Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name">
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
            <div class="mt-3">
                <input type="submit" value="Submit" name="insert" class="">
            </div>
        </form>
    </div>
</div>

<?php
// Header CSS & Fonts
include_once('include/footer.php');
?>

<?php
    // Unset Session
    unset( $_SESSION['password_wrong'] );
    unset( $_SESSION['email_error'] );
    unset( $_SESSION['insert_fail'] );
?>