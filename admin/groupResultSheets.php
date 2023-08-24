<?php
// Connect Function
require_once('include/function.php');

// Connect Header
include_once('include/header.php');
if (isset($_POST['result']) && !empty($_POST['semesterId'])) {
    $semesterId = $_POST['semesterId'];

    // Select Students Table
    $where = "semesterId = $semesterId";
    $student = selectAnyWhereQueryAll('students', $where);
    
    // Select Semester Table
    $semesterQuery = selectAnyTableWhereId('semesters', $semesterId);
    $semester = $semesterQuery->fetch_object();
}
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <h2 class="text-center"><strong><?php echo $semester->name; ?></strong> All Students Result</h2>
    <hr>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>SL</th>
                <th>Student Name</th>
                <th>Student Roll</th>
                <th>Total Mark</th>
                <th>Gpa</th>
                <th>Grade</th>
            </tr>
        </thead>
        <tbody>

                <?php
                if ($student->num_rows > 0) {
                    $i = 1;
                    while ($data = $student->fetch_object()) {
                        $totalMark = 0;
                        $studentReg = $data->reg;
                        $totalSubject = 0;
                        $gpaGradePoint = 0;
                        $isFails = 1;
                        $totalFails = 0;
                        $mark = 0;
                        $where2 = "studentReg = $studentReg and semesterId = $semesterId";
                        $markSheets = selectAnyWhereQueryAll('markSheets', $where2);
                        while( $mark = $markSheets->fetch_object() ) {
                            // Fail Condition
                            if( $mark->mark <= 32 ) {
                                $isFails = 0;
                                $totalFails++;
                            }

                            $totalMark += $mark->mark;
                            $totalSubject++;
                            $gpaGradePoint += getGradePoint($mark->mark);
                            $cGpa = number_format($gpaGradePoint/$totalSubject*$isFails, 2);
                        }
                ?>
                            <tr>
                        <td><?php echo $i++; ?></td>
                        <td><?php echo $data->studentName; ?></td>
                        <td><?php echo $data->roll; ?></td>
                        <td><?php if( $mark != 0 ) echo $totalMark; ?></td>
                        <td><?php if( $mark != 0 ) echo $cGpa; ?></td>
                        <td><?php if( $mark != 0 ) echo getCGpa($cGpa); ?><br><?php if( $totalFails != 0 ) echo 'Fail: ' , $totalFails; ?></td>
                        
            </tr>
                <?php
                    }
                }
                ?>

        </tbody>
    </table>
</div>

<?php
// Connect Footer
include_once('include/footer.php');
?>