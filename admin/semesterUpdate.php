<?php
// Session Start
session_start();

// Log Out Use
if (!isset($_SESSION['login_success'])) {
    header('location: login.php');
}
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header
include_once('include/header.php');
?>

<?php
// Get Data Web Site
// Function Connect Show Data
require_once('include/function.php');
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $result = selectAnyTableWhereId('semester', $id);

    if ($result->num_rows == 1) {
        $data = $result->fetch_object();
    }
}
?>

<div class="col-md-9 ps-3">
    <a href="semester.php" class="btn btn-info">All Semester List</a>
    <h2 class="text-center">Edit <?php echo $data->semester; ?></h2>
    <hr>

    <?php
    if (isset($_SESSION['update_error'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['update_error']; ?>
        </div>
    <?php
    }
    ?>

    <form action="semesterStore.php" class="form box-shadow" method="post">
        <div class="mt-3">
            <label for="semester" class="form-label">Semester Name</label>
            <input type="text" name="semester" id="semester" class="form-control" value="<?php echo $data->semester; ?>">
            <input type="hidden" name="id" value="<?php echo $data->id; ?>">
        </div>
        <input type="submit" value="Update" name="update" class="form-control mt-3 bg-info">
    </form>
</div>

<?php
// Footer
include_once('include/footer.php');
?>

<?php
// Unset Session
unset($_SESSION['update_error']);
