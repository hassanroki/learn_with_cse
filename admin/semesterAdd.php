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
    <a href="semester.php" class="btn btn-info px-3">Semester List</a>
    <h2 class="text-center">Add New Class</h2>
    <hr>

    <?php
    if (isset($_SESSION['insert_error'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['insert_error']; ?>
        </div>
    <?php
    }
    ?>

    <form action="semesterStore.php" class="form box-shadow" method="post">
        <div class="mt-3">
            <label for="semester" class="form-label">Semester Name </label>
            <input type="text" name="semester" id="semester" placeholder="Enter Semester" class="form-control">
        </div>
        <div class="mt-3">
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