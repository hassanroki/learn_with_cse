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

// Any Table Where Any Column
$getStudents = selectAnyTableWhereColumnId('students', 'semesterId', $semesterId);
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <h3 class="text-center">Class Six, Subject: Bangla</h3>
    <h3 class="text-center">Code: 101, Class Teacher: Mahfuj</h3>
    <h3 class="text-center">Full Mark: 100, Exam Year: 2023</h3>
    <hr>
    <form action="courses.php" class="form" method="post">
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
                            <input type="hidden" name="id[]" value="<?php echo $data -> id; ?>" class="form-control" placeholder="Enter Mark">
                            <input type="hidden" name="reg[]" value="<?php echo $data -> reg; ?>" class="form-control" placeholder="Enter Mark">
                            <input type="text" name="mark[]" id="" class="form-control" placeholder="Enter Mark">
                        </td>
                    </tr>
                <?php
                }
                ?>
                <tr>
                    <td colspan="5" class="text-end">
                        <input type="submit" value="Submit" class="">
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>

<?php
// Footer
include_once('include/footer.php');
