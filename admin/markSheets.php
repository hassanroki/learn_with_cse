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
// Call Function Used Query
require_once('include/function.php');

// MarkSheets Table Data Show
$markSheets = showDataAnyTable('markSheets');

?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="markEntry.php" class="btn btn-info">Mark Entry</a>
    <h2 class="text-center">All MarkSheets</h2>
    <hr>

    <?php
    if (isset($_SESSION['insert_data'])) {
    ?>
        <div class="alert alert-success">
            <strong>Success!</strong> <?php echo $_SESSION['insert_data']; ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['update_data'])) {
    ?>
        <div class="alert alert-success">
            <strong>Success!</strong> <?php echo $_SESSION['update_data']; ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['delete_data'])) {
    ?>
        <div class="alert alert-success">
            <strong>Success!</strong> <?php echo $_SESSION['delete_data']; ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['delete_error'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['delete_error']; ?>
        </div>
    <?php
    }
    ?>

    <table class="table table-bordered box-shadow">
        <thead>
            <tr>
                <th>SL</th>
                <th>Id</th>
                <th>Student Name</th>
                <th>Subject Name</th>
                <th>Mark</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?Php
            $i = 1;
            if ($markSheets->num_rows > 0) {
                while ($row = $markSheets->fetch_assoc()) {

                    // Subjects Table Data Show
                    $studentId = $row['studentId'];
                    $studentResult = selectAnyTableWhereId('students', $studentId);
                    $student = $studentResult -> fetch_assoc();

                    // Subjects Table Data Show
                    $subjectId = $row['subjectId'];
                    $subjectResult = selectAnyTableWhereId('subjects', $subjectId);
                    $subject = $subjectResult -> fetch_assoc();

            ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $student['studentName']; ?></td>
                        <td><?php echo $subject['courseTitle']; ?></td>
                        <td><?php echo $row['mark']; ?></td>
                        <td>
                            <a href="markSheetsView.php?id=<?php echo $row['id']; ?>" class="btn btn-info">View</a>
                            <a href="markSheetsUpdate.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="markSheetsStore.php?id=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>

        </tbody>
    </table>
</div>

<?php
// Footer
include_once('include/footer.php');
?>

<?php

// Session Unset
unset($_SESSION['insert_data']);
unset($_SESSION['update_data']);
unset($_SESSION['delete_data']);
unset($_SESSION['delete_error']);
