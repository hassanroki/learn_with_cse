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

    $data = [];
    if( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ) {
        $id = $_GET['id'];

        $viewData = selectAnyTableWhereId('subjects', $id);
        if( $viewData -> num_rows == 1 ) {
            $subjects = $viewData -> fetch_assoc();

            // Teachers Table
            $teacherId = $subjects['teacherId'];
            $teacherView = selectAnyTableWhereId('teachers', $teacherId);
            $teachers = $teacherView -> fetch_assoc();

            // Semester Table
            $semesterId = $subjects['semesterId'];
            $semesterView = selectAnyTableWhereId('semester', $semesterId);
            $semester = $semesterView -> fetch_assoc();
        }
    }
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="subjects.php" class="btn btn-info">All Subjects</a>
    <h2 class="text-center">View <?php echo $subjects['courseTitle']; ?></h2>
    <hr>

    <table class="table table-bordered box-shadow">
        <thead>
            <tr>
                <th>Id</th>
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Credit</th>
                <th>Mark</th>
                <th>Teacher Name</th>
                <th>Semester Name</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?php echo $subjects['id']; ?></td>
                <td><?php echo $subjects['courseCode']; ?></td>
                <td><?php echo $subjects['courseTitle']; ?></td>
                <td><?php echo $subjects['credit']; ?></td>
                <td><?php echo $subjects['mark']; ?></td>
                <td><?php echo $teachers['name']; ?></td>
                <td><?php echo $semester['semester']; ?></td>
            </tr>
        </tbody>
    </table>
</div>

<?php
    // Footer
    include_once('include/footer.php');