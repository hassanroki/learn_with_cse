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
// Show Data to MarkSheets Table
// Connect Function Used Query

require_once('include/function.php');
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $showDataMarkSheetsTable = selectAnyTableWhereId('markSheets', $id);
    if ($showDataMarkSheetsTable->num_rows == 1) {
        $data = $showDataMarkSheetsTable->fetch_object();
    }
}

// Students Table Data View
$student = showDataAnyTable('students');

// Semester Table Data Show
$semester = showDataAnyTable('semester');

// Subjects Table Data Show
$subject = showDataAnyTable('subjects');
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="markSheets.php" class="btn btn-info">All MarkSheets</a>
    <h2 class="text-center">Edit MarkSheets Table Data</h2>
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

    <form action="markSheetsStore.php" class="form box-shadow submit-button" method="post">

        <div class="mt-3">
            <label for="studentId" class="form-label">Students Name</label>
            <input type="hidden" name="id" value="<?php echo $data->id; ?>">
            <select name="studentId" id="studentId" class="form-control">
                <option value="">Select Student Name</option>
                <?php
                if ($student->num_rows > 0) {
                    while ($studentData = $student->fetch_assoc()) {
                ?>
                        <option value="<?php echo $studentData['id']; ?>" selected><?php echo $studentData['studentName']; ?></option>
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
                    while ($semesterData = $semester->fetch_object()) {
                ?>
                        <option value="<?php echo $semesterData->id; ?>" selected><?php echo $semesterData->semester; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="mt-3">
            <label for="subjectId" class="form-label">Subject Name</label>
            <select name="subjectId" id="subjectId" class="form-control">
                <option value="">Select Subject Name</option>
                <?php
                if ($subject->num_rows > 0) {
                    while ($subjectData = $subject->fetch_object()) {
                ?>
                        <option value="<?php echo $subjectData->id; ?>" selected><?php echo $subjectData->courseTitle; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="mt-3">
            <label for="mark" class="form-label">Mark</label>
            <input type="text" name="mark" value="<?php echo $data->mark; ?>" id="mark" class="form-control" placeholder="Enter Mark">
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
