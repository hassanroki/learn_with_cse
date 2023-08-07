<?php
// Header
include_once('include/header.php');
?>

<?php
// Connect DB
require('include/connect.php');

// Query Used Function
require_once('include/function.php');

// Semester Id from SubjectList
$semesterId = $_POST['semesterId'];
$subjectId = $_POST['subjectId'];

// Any Table Where Any Column
$getStudents = selectAnyTableWhereColumnId('students', 'semesterId', $semesterId);
$getSemester = selectAnyTableWhereColumnId('semester', 'id', $semesterId);
$getSubjects = selectAnyTableWhereColumnId('subjects', 'id', $subjectId);

$semesterData = $getSemester -> fetch_object();
$subjectsData = $getSubjects -> fetch_object();
$teacher = $subjectsData -> teacherId;

 $getTeachers = selectAnyTableWhereColumnId('teachers', 'id', $teacher);
 $teachersData = $getTeachers -> fetch_object();
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <h3 class="text-center"><?php echo $semesterData -> semester; ?>, Subject: <?php echo $subjectsData -> courseTitle; ?></h3>
    <h3 class="text-center">Code: <?php echo $subjectsData -> courseCode; ?>, Teacher: <?php echo $teachersData -> name; ?></h3>
    <h3 class="text-center">Full Mark: <?php echo $subjectsData -> mark; ?>, Exam Year: <?php echo date('Y'); ?></h3>
    <hr>
    <form action="markSheetsStore.php" class="form" method="post">
        <input type="hidden" name="subjectId" id="" value="<?php echo $subjectId; ?>">
        <input type="hidden" name="semesterId" id="" value="<?php echo $semesterId; ?>">
        <table class="table table-bordered box-shadow submit-button">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>Roll</th>
                    <th>Reg</th>
                    <th>Mark</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 1;
                while ($data = $getStudents->fetch_object()) {
                ?>
                    <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data -> studentName; ?></td>
                        <td><?php echo $data -> roll; ?></td>
                        <td><?php echo $data -> reg; ?></td>
                        <td>
                            <input type="hidden" name="studentId[]" value="<?php echo $data -> id; ?>" class="form-control" placeholder="Enter Mark">
                            <input type="hidden" name="studentReg[]" value="<?php echo $data -> reg; ?>" class="form-control" placeholder="Enter Mark">
                            <input type="number" name="mark[]" id="" class="form-control" placeholder="Enter Mark">
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="5" class="text-end">
                        <input type="submit" value="Submit" class="" name="insert">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<?php
// Footer
include_once('include/footer.php');
