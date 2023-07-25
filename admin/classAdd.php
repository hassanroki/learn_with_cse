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

<!-- Html -->

<div class="col-md-9 ps-3">
    <a href="classStore.php" class="btn btn-info px-3">Class List</a>
    <hr>
    <h2 class="text-center">Add New Class</h2>
    <?php
    if (isset($_SESSION['insert_error'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['insert_error']; ?>
        </div>
    <?php
    }
    ?>
    <form action="classStore.php" class="form" method="post">
        <div class="mb-3">
            <label for="className" class="form-label">Class Name </label>
            <input type="text" name="className" id="className" placeholder="Enter Your Class" class="form-control">
        </div>
        <div class="mb-3">
            <input type="submit" value="Submit" name="insert" class="form-control bg-danger text-white">
        </div>
    </form>
</div>

<?php
// Footer
include_once('include/footer.php');
?>

<?php
// Unset Session
unset($_SESSION['insert_error']);
?>