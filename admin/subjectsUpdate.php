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
// Show Data to Subjects Table
// Connect Function Used Query

require_once('include/function.php');
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $showDataSubjectsTable = selectAnyTableWhereId('subjects', $id);
    if ($showDataSubjectsTable->num_rows == 1) {
        $data = $showDataSubjectsTable->fetch_object();
    }
}

// Teachers Table Data Show
$teacher = showDataAnyTable('teachers');

// Semester Table Data Show
$semester = showDataAnyTable('semester');
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="subjects.php" class="btn btn-info">All Subjects</a>
    <h2 class="text-center">Edit <?php echo $data->courseTitle; ?> </h2>
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

    <form action="subjectsStore.php" class="form box-shadow submit-button" method="post">
        <div class="mt-3">
            <label for="courseCode" class="form-label">Course Code</label>
            <input type="text" name="courseCode" id="courseCode" class="form-control" placeholder="Enter Course Code" value="<?php echo $data->courseCode; ?>">
            <input type="hidden" name="id" value="<?php echo $data->id; ?>">
        </div>
        <div class="mt-3">
            <label for="courseTitle" class="form-control">Course Title</label>
            <input type="text" name="courseTitle" id="courseTitle" class="form-control" placeholder="Enter Course Title" value="<?php echo $data->courseTitle; ?>">
        </div>
        <div class="mt-3">
            <label for="credit" class="form-label">Credit</label>
            <input type="text" name="credit" id="credit" class="form-control" placeholder="Enter Credit" value="<?php echo $data->credit; ?>">
        </div>
        <div class="mt-3">
            <label for="mark" class="form-label">Mark</label>
            <input type="text" name="mark" id="mark" class="form-control" placeholder="Enter Mark" value="<?php echo $data->mark; ?>">
        </div>
        <div class="mt-3">
            <label for="teacherId" class="form-label">Teacher Name</label>
            <select name="teacherId" id="teacherId" class="form-control">
            <option value="">Select Teacher Name</option>
                <?php
                if ($teacher->num_rows > 0) {
                    while ($data = $teacher->fetch_object()) {
                ?>
                        <option value="<?php echo $data->id; ?>" selected><?php echo $data->name; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="mt-3">
            <label for="semesterId" class="form-label">Semester Name</label>
            <select name="semesterId" id="semesterId" class="form-control">
                <option value="">Select Semester Name</option>
                <?php
                if ($semester->num_rows > 0) {
                    while ($row = $semester->fetch_assoc()) {
                ?>
                        <option value="<?php echo $row['id']; ?>" selected><?php echo $row['semester']; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="mt-3">
            <input type="submit" value="Update" name="update">
        </div>
    </form>
</div>

<?php
// Footer
include_once('include/footer.php');
?>

<?php
// Unset Session
unset($_SESSION['update_error']);