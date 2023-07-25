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
// Categories Id Show Website
// Connect Function File use Show Query
require_once('include/function.php');
$showData = showDataAnyTable('categories');

?>

<!-- Html  -->
<div class="col-md-9 ps-3">
    <a href="courses.php" class="btn btn-info">All Courses List</a>

    <?php
    if (isset($_SESSION['data_error'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['data_error']; ?>
        </div>
    <?php
    }
    ?>

    <h2 class="text-center">Added New Course</h2>
    <hr>
    <form action="coursesStore.php" class="form box-shadow submit-button" method="post" enctype="multipart/form-data">

        <div class="mt-3">
            <label for="categoryId" class="form-label">Category Id</label>

            <select name="categoryId" id="categoryId" class="form-control">
                <?php
                if ($showData->num_rows > 0) {
                    while ($data = $showData->fetch_object()) {
                ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->name; ?></option>
                <?php
                    }
                }
                ?>
            </select>

        </div>

        <div class="mt-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Course Name">
        </div>
        <div class="mt-3">
            <label for="profilePhoto" class="form-label">Course Photo</label>
            <input type="file" name="profilePhoto" id="profilePhoto">
        </div>
        <div class="mt-3">
            <label for="description" class="form-label">Course Description</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control" placeholder="Enter Course Details"></textarea>
        </div>
        <div class="mt-3">
            <input type="submit" value="Submit" name="insert">
        </div>
    </form>
</div>

<?php
// Footer
include('include/footer.php');
?>

<?php
// Unset Session
unset($_SESSION['data_error']);
?>