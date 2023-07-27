<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header
include_once('include/header.php');
?>

<?php
// Connect Function
require_once('include/function.php');
// Mark Sheets Table Data View Web Site
$data = $student = $semester = $subject = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $result = selectAnyTableWhereId('markSheets', $id);

    if ($result->num_rows == 1) {
        $data = $result->fetch_object();

        // Students Table Data Viewing
        $studentId = $data->studentId;
        $studentResult = selectAnyTableWhereId('students', $studentId);
        $student = $studentResult->fetch_object();

        // Semester Table Data Show
        $semesterId = $data -> semesterId;
        $semesterResult = selectAnyTableWhereId('semester', $semesterId);
        $semester = $semesterResult -> fetch_object();

        // Subjects Table Data Show
        $subjectId = $data -> subjectId;
        $subjectResult = selectAnyTableWhereId('subjects', $subjectId);
        $subject = $subjectResult -> fetch_object();
    }
}

if ($data == null) {
    header('location: markSheets.php');
}
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="markSheets.php" class="btn btn-info">All MarkSheets</a>
    <h2 class="text-center">View MarkSheets Data</h2>
    <hr>

    <table class="table table-bordered box-shadow">
        <thead>
            <tr>
                <th>Id</th>
                <th>Student Name</th>
                <th>Student Roll</th>
                <th>Student Registration</th>
                <th>Semester Name</th>
                <th>Subject Name</th>
                <th>Mark</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $data -> id; ?></td>
                <td><?php echo $student -> studentName; ?></td>
                <td><?php echo $student -> roll; ?></td>
                <td><?php echo $student -> reg; ?></td>
                <td><?php echo $semester -> semester; ?></td>
                <td><?php echo $subject -> courseTitle; ?></td>
                <td><?php echo $data -> mark; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php
// Footer
include_once('include/footer.php');
