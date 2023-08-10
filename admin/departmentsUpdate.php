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
// Header & Function
include_once('include/header.php');
require_once('include/function.php');
?>

<?php
// Get Data Web Site
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $result = selectAnyTableWhereId('departments', $id);

    if ($result->num_rows == 1) {
        $data = $result->fetch_object();
    }
}
?>

<div class="col-md-9 ps-3">
    <a href="departments.php" class="btn btn-info">All Departments</a>
    <h2 class="text-center">Edit <?php echo $data->name; ?></h2>
    <hr>
    <form action="departmentsStore.php" class="form box-shadow" method="post">
        <div class="mt-3">
            <label for="name" class="form-label">Department</label>
            <input type="text" name="name" id="name" class="form-control" value="<?php echo $data->name; ?>">
            <input type="hidden" name="id" value="<?php echo $data->id; ?>">
        </div>
        <input type="submit" value="Update" name="update" class="form-control mt-3 bg-info">
    </form>
</div>

<?php
// Footer
include_once('include/footer.php');
