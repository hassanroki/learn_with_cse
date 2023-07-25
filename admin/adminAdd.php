<?php
// Session Start
session_start();

// Log Out Use
if (!isset($_SESSION['login_success'])) {
    header('location: login.php');
}
?>

<?php
// Header
include_once('include/header.php');
?>

<?php
// Connect DB
require('include/connect.php');
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="admin.php" class="btn btn-info px-3">Admin List</a>
    <hr>
    <h2 class="text-center">Add New Admin</h2>

    <?php
    if (isset($_SESSION['insert_error'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['insert_error']; ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['password_wrong'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['password_wrong']; ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['email_exits'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['email_exits']; ?>
        </div>
    <?php
    }
    ?>

    <div class="box-shadow submit-button">
        <form action="adminStore.php" class="form" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="adminName" class="form-label">Admin Name</label>
                <input type="text" name="adminName" id="adminName" class="form-control" placeholder="Enter Admin Name" required>
            </div>
            <div class="mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
            </div>
            <div class="mt-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
            </div>
            <div class="mt-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Enter Confirm Password">
            </div>
            <div class="mt-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="number" name="contact" id="contact" class="form-control" placeholder="Enter Contact">
            </div>
            <div class="mt-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
            </div>
            <div class="mt-3">
                <label for="profilePhoto" class="form-label">Profile Photo</label>
                <input type="file" name="profilePhoto" id="profilePhoto" class="form-control">
            </div>
            <input type="submit" value="Submit" name="insert" class="mt-3">
        </form>
    </div>
</div>

<?php
// Footer
include_once('include/footer.php');
?>

<?php
// Unset Session
unset($_SESSION['insert_error']);
unset($_SESSION['password_wrong']);
unset($_SESSION['email_exits']);
?>