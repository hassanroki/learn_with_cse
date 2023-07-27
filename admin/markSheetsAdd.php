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
// Connect Function Used Query
require_once('include/function.php');

// Students Table Data Show
$students = showDataAnyTable('students');

// Semester Table Data Show
$semester = showDataAnyTable('semester');

// Subjects Table Data Show
$subjects = showDataAnyTable('subjects');
?>

<!-- Html -->

<div class="col-md-9 ps-3">
    <a href="markSheets.php" class="btn btn-info">All MarkSheets</a>
    <h2 class="text-center">Add New MarkSheets</h2>
    <hr>

    <?php
        if( isset( $_SESSION['subject_exits'] ) ) {
            ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> <?php echo $_SESSION['subject_exits']; ?>
            </div>
            <?php
        }
    ?>

    <?php
        if( isset( $_SESSION['insert_error'] ) ) {
            ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> <?php echo $_SESSION['insert_error']; ?>
            </div>
            <?php
        }
    ?>

    <form action="markSheetsStore.php" class="form box-shadow submit-button" method="post">
        <div class="mt-3">
            <label for="studentId" class="form-label">Student Name</label>
            <select name="studentId" id="studentId" class="form-control">
                <option value="" selected>Select Student Name</option>
                <?php
                if ($students->num_rows > 0) {
                    while ($data = $students->fetch_object()) {
                ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->studentName; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="mt-3">
            <label for="semesterId" class="form-label">Semester Name</label>
            <select name="semesterId" id="semesterId" class="form-control">
                <option value="" selected>Select Semester Name</option>
                <?php
                if ($semester->num_rows > 0) {
                    while ($data = $semester->fetch_object()) {
                ?>
                        <option value="<?php echo $data->id; ?>"><?php echo $data->semester; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="mt-3">
            <label for="subjectId" class="form-label">Subject Name</label>
            <select name="subjectId" id="subjectId" class="form-control">
                <option value="" selected>Select Subject Name</option>
                <?php
                if ($subjects->num_rows > 0) {
                    while ($data = $subjects->fetch_assoc()) {
                ?>
                        <option value="<?php echo $data['id']; ?>"><?php echo $data['courseTitle']; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="mt-3">
            <label for="mark" class="form-label">Mark</label>
            <input type="text" name="mark" id="mark" class="form-control" placeholder="Enter Mark">
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
    // Session Unset
    unset( $_SESSION['subject_exits'] );
    unset( $_SESSION['insert_error'] );
