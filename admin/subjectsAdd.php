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

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="subjects.php" class="btn btn-info">All Subjects</a>
    <h2 class="text-center">Add New Subjects</h2>
    <hr>

    <?php
        if( isset( $_SESSION['insert_error'] ) ) {
            ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> <?php echo $_SESSION['insert_error']; ?>
            </div>
            <?php
        }
    ?>

    <form action="subjectsStore.php" class="form box-shadow submit-button" method="post">
        <div class="mt-3">
            <label for="courseCode" class="form-label">Course Code</label>
            <input type="text" name="courseCode" id="courseCode" class="form-control" placeholder="Enter Course Code">
        </div>
        <div class="mt-3">
            <label for="courseTitle" class="form-control">Course Title</label>
            <input type="text" name="courseTitle" id="courseTitle" class="form-control" placeholder="Enter Course Title">
        </div>
        <div class="mt-3">
            <label for="credit" class="form-label">Credit</label>
            <input type="text" name="credit" id="credit" class="form-control" placeholder="Enter Credit">
        </div>
        <div class="mt-3">
            <input type="submit" value="Submit" name="insert">
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
