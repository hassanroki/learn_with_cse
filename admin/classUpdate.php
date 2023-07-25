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
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $selectSql = "SELECT * FROM class WHERE id = '$id'";
    $result = $conn->query($selectSql);

    if ($result->num_rows == 1) {
        $data = $result->fetch_object();
    }
}
?>

<div class="col-md-9 ps-3">
    <h2 class="text-center">Edit <?php echo $data->className; ?></h2>
    <form action="classStore.php" class="form" method="post">
        <div class="mt-3">
            <label for="className" class="form-label">Class Name</label>
            <input type="text" name="className" id="className" class="form-control" value="<?php echo $data->className; ?>">
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
unset($_SESSION['']);
?>