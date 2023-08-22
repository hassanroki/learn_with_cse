<?php
// Session Start
session_start();

// Connect DB
require('include/connect.php');

// Query Function
require_once('include/function.php');

// Header
include_once('include/header.php');

// Collect Result File Information
$semesterId = $_POST['semesterId'];
$studentReg = $_POST['studentReg'];

// MarkSheets Table Data
$where = "semesterId = $semesterId and studentReg = $studentReg";
$getMarkSheets = selectAnyWhereQueryAll('markSheets', $where);
// var_dump($getMarkSheets);



if ($getMarkSheets->num_rows == 0) {
    $_SESSION['reg_exits'] = "Semester Or Registration Invalid!";
    echo "<script>window.location.href = 'result.php'</script>";
}

// Students Table
$where = "semesterId = $semesterId and reg = $studentReg";
$getStudents = selectAnyWhereQuery('students', $where);
//var_dump($getStudents);

// Department Table Data
$departmentId = $getStudents->departmentId;
$departmentData = selectAnyTableWhereColumnId('departments', 'id', $departmentId);
$department = $departmentData->fetch_object();

?>

<!-- Html -->
<div class="col-md-9 ps-3 result-sheets">
    <div class="text-end">
        <button class="btn btn-danger printBtn" onclick="window.print()" id="print-btn">Print</button>
    </div>
    <div class="row">
        <div class="col-md-12">
            <h4 class="text-center">Bangladesh Technical Education Board Dhaka, Bangladesh</h4>
            <h4 class="text-center">Semester Three Evaluation</h4>
            <h4 class="text-center">Exam Year <?php echo date('Y'); ?></h4>
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <td>Serial No. CB 1277980188</p>
                        </td>
                        <td class="text-center"><img src="asset/img/ecb-logo.png" alt="logo" class="img-fluid"></td>
                        <td></td>
                        <td rowspan="5">
                            <table class="table sub-table table-bordered border-dark fs-6">
                                <thead>
                                    <tr>
                                        <td>Letter Grade</td>
                                        <td>Class Interval</td>
                                        <td>Grade Point</td>
                                    </tr>
                                    <tr>
                                        <td>A+</td>
                                        <td>80-100</td>
                                        <td>5.0</td>
                                    </tr>
                                    <tr>
                                        <td>A</td>
                                        <td>70-79</td>
                                        <td>4.0</td>
                                    </tr>
                                    <tr>
                                        <td>A-</td>
                                        <td>60-69</td>
                                        <td>3.5</td>
                                    </tr>
                                    <tr>
                                        <td>B</td>
                                        <td>50-59</td>
                                        <td>3.0</td>
                                    </tr>
                                    <tr>
                                        <td>C</td>
                                        <td>40-49</td>
                                        <td>2.5</td>
                                    </tr>
                                    <tr>
                                        <td>D</td>
                                        <td>33-39</td>
                                        <td>2.0</td>
                                    </tr>
                                    <tr>
                                        <td>F</td>
                                        <td>00-32</td>
                                        <td>0.0</td>
                                    </tr>
                                </thead>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>H82B990 CB77980188</td>
                        <td colspan="2" class="text-decoration-underline">ACADEMIC TRANSCRIPT</td>
                    </tr>
                    <tr>
                        <td><strong>Name of Student</strong>:</td>
                        <td><i><?php echo $getStudents->studentName; ?></i></td>
                    </tr>
                    <tr>
                        <td><strong>Father's Name</strong>:</td>
                        <td><i><?php echo $getStudents->fatherName; ?></i></td>
                    </tr>
                    <tr>
                        <td><strong>Mother's Name</strong>:</td>
                        <td><i><?php echo $getStudents->motherName; ?></i></td>
                    </tr>
                    <tr>
                        <td><strong>Name of Institute</strong>:</td>
                        <td><i>GUB</i></td>
                        <td><strong>Type</strong>:</td>
                        <td><i>Regular</i></td>
                    </tr>
                    <tr>
                        <td><strong>Name Code</strong>:</td>
                        <td>127799</td>
                        <td><strong>Passing Year</strong>:</td>
                        <td><?php echo date('Y'); ?></td>
                    </tr>
                    <tr>
                        <td><strong>Roll No</strong>:
                        </td>
                        <td><i><?php echo $getStudents->roll; ?></i></td>
                        <td><strong>Reg No</strong>:</td>
                        <td><i><?php echo $getStudents->reg; ?></i></td>
                    </tr>
                    <tr>
                        <td><strong>Department</strong>:</td>
                        <td><i><?php echo $department->name; ?></i></td>
                        <td><strong>Date of Birth</strong>:</td>
                        <td><i><?php echo $getStudents->age; ?></i></td>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered box-shadow">
                <thead>
                    <tr>
                        <th>SL</th>
                        <th>Subject Name - Code</th>
                        <th>Mark</th>
                        <th>Grade Point</th>
                        <th>Letter Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    $count = 0;
                    $totalMark = 0;
                    $gpaGradePoint = 0;
                    if ($getMarkSheets->num_rows > 0) {
                        while ($data = $getMarkSheets->fetch_object()) {
                            $totalMark += $data->mark;
                            $count++;
                            $gpaGradePoint += getGradePoint($data->mark);
                            $cGpa = number_format($gpaGradePoint / $count, 2);

                            $subjectId = $data->subjectId;
                            $subjectData = selectAnyTableWhereColumnId('subjects', 'id', $subjectId);
                            $subject = $subjectData->fetch_object();
                    ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><?php echo $subject->courseTitle . ' - ' . $subject->courseCode; ?></td>
                                <td><?php echo $data->mark; ?></td>
                                <td><?php echo getGradePoint($data->mark); ?></td>
                                <td><?php echo getLetterGrade($data->mark); ?></td>
                            </tr>
                        <?php
                        }

                        ?>
                        <tr>
                            <td colspan="3"><strong>Total Mark</strong>: <?php echo $totalMark; ?></td>
                            <td>cGPA: <?php echo $cGpa; ?></td>
                            <td>Average Grade: <?php echo getCGpa($cGpa); ?></td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
// Footer
include_once('include/footer.php');

// Unset Session
unset($_SESSION['']);
