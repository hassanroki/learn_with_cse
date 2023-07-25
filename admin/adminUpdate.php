<?php
    // Session Start
    session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header
include_once('include/headerCssFonts.php');
?>

<?php
// Admin Table Data Showing Website
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $selectAdmin = "SELECT * FROM admin WHERE id = '$id'";
    $result = $conn->query($selectAdmin);

    if ($result->num_rows == 1) {
        $data = $result->fetch_object();
    }
}
?>


<!-- Html -->
<div class="admin-update py-5">
    <div class="container">
        <div class="row submit-button">
            <a href="admin.php" class="btn btn-info px-3">Admin List</a>
            <h2 class="text-center">Update Admin</h2>

            <?php
            if (isset($_SESSION['update_error'])) {
            ?>
                <div class="alert alert-warning">
                    <strong>Warning!</strong> <?php echo $_SESSION['update_error']; ?>
                </div>
            <?php
            }
            ?>

            <hr>
            <div class="box-shadow">
                <form action="adminStore.php" class="form" method="post" enctype="multipart/form-data">
                    <div class="mt-3">
                        <label for="adminName" class="form-label">Admin Name</label>
                        <input type="text" name="adminName" id="adminName" class="form-control" value="<?php echo $data->adminName; ?>" required>
                        <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="number" name="contact" id="contact" class="form-control" value="<?php echo $data->contact; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $data->address; ?>">
                    </div>
                    <input type="submit" value="Submit" name="update" class="mt-3">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Footer
include_once('include/footerJs.php');
?>

<?php
// Unset Session
unset($_SESSION['update_error']);

?>