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
include_once('include/header.php');
?>

<?php
// Course Table Data View Web Site
// Connect Function File Used Show and View Query
require_once('include/function.php');

$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $viewData = selectAnyTableWhereId('courses', $id);

    if ($viewData->num_rows == 1) {
        $data = $viewData->fetch_object();
    }
}


// Category Table Data Website showing
$showData = showDataAnyTable('categories');

if ($data == null) {
    header('location: courses.php');
}

?>

<!-- Html  -->
<div class="col-md-9 ps-3">
    <a href="courses.php" class="btn btn-info">All Courses List</a>

    <?php
    if (isset($_SESSION['update_error'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['update_error']; ?>
        </div>
    <?php
    }
    ?>

    <h2 class="text-center">Edit <?php echo $data-> name; ?></h2>
    <hr>
    <form action="coursesStore.php" class="form box-shadow submit-button" method="post" enctype="multipart/form-data">
        <div class="mt-3">
            <label for="categoryId" class="form-label">Category Name</label>

            <select name="categoryId" id="categoryId" class="form-control">
                <?php
                if ($showData->num_rows > 0) {
                    while ($row = $showData->fetch_assoc()) {
                ?>
                    <option value="<?php echo $row['id']; ?>" selected><?php echo $row['name']; ?></option>
                <?php
                    }
                }
                ?>
            </select>

            <input type="hidden" name="id" value="<?php echo $data->id; ?>">
        </div>
        <div class="mt-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Course Name" value="<?php echo $data->name; ?>">
        </div>
        <div class="mt-3">
            <label for="profilePhoto" class="form-label">Course Photo</label>
            <input type="file" name="profilePhoto" id="profilePhoto" class="form-control">
            <img src="<?php echo $data->profilePhoto; ?>" alt="profilePhoto" width="100px" class="img-fluid rounded">
        </div>
        <div class="mt-3">
            <label for="description" class="form-label">Course Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter Course Details"><?php echo $data->description; ?></textarea>
        </div>
        <div class="mt-3">
            <input type="submit" value="Update" name="update">
        </div>
    </form>
</div>

<?php
// Footer
include('include/footer.php');
?>

<?php
// Unset Session
unset($_SESSION['update_error']);
?>