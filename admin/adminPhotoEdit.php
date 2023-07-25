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
            <h2 class="text-center">Update Students</h2>
            <?php
            if (isset($_SESSION['img_error'])) {
            ?>
                <div class="alert alert-warning">
                    <strong>Warning!</strong> <?php echo $_SESSION['img_error']; ?>
                </div>
            <?php
            }
            ?>
            <hr>
            <div class="box-shadow">
                <form action="adminStore.php" class="form" method="post" enctype="multipart/form-data">
                    <div class="mt-3">
                        <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                        <label for="profilePhoto" class="form-label">Profile Photo</label>
                        <input type="file" name="profilePhoto" id="profilePhoto" class="form-control" required>
                        <img src="<?php echo $data->profilePhoto; ?>" alt="" class="img-fluid" width="100px">
                    </div>
                    <input type="submit" value="Update" name="imgUpdate" class="mt-3">
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
unset($_SESSION['img_error']);

?>