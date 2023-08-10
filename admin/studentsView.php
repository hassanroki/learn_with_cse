<?php
// Session Start
session_start();

// Log Out Use
if (!isset($_SESSION['login_success'])) {
    header('location: login.php');
}
?>

<?php
// Connect DB and Function
require('include/connect.php');
require_once('include/function.php');
?>

<?php
// Header CSS Fonts
include_once('include/headerCssFonts.php');
?>

<?php
// Students Viewing
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    
    $result = selectAnyTableWhereId('students', $id);

    if ($result->num_rows == 1) {
        $data = $result->fetch_object();

        // Semester Viewing
        $semesterId = $data -> semesterId;
        $semesterResult = selectAnyTableWhereId('semesters', $semesterId);
        $semesterView = $semesterResult -> fetch_object();

        // Departments View
        $departmentId = $data -> departmentId;
        $departmentResult = selectAnyTableWhereId('departments', $departmentId);
        $departmentView = $departmentResult -> fetch_object();
        
        // Gender Viewing
        $genderId = $data -> genderId;
        $genderResult = selectAnyTableWhereId('genders', $genderId);
        $genderView = $genderResult -> fetch_object();
    }
}
?>

<!-- Html -->
<div class="students-view py-5">
    <div class="container">
        <div class="row">
            <a href="students.php" class="btn btn-info text-center">Students List</a>
            <hr>
            <div class="col-md-4 pe-3 box-shadow">
                <h2 class="text-center"><?php echo $data->studentName; ?></h2>
                <img src="<?php echo $data->profilePhoto; ?>" alt="img" class="img-fluid rounded">
            </div>
            <div class="col-md-8 ps-3 box-shadow">
                <h2 class="text-center">Details</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <td><?php echo $data->id; ?></td>
                        </tr>
                        <tr>
                            <th>usersId</th>
                            <td><?php echo $data->userId; ?></td>
                        </tr>
                        <tr>
                            <th>Student Name</th>
                            <td><?php echo $data->studentName; ?></td>
                        </tr>
                        <tr>
                            <th>Father Name</th>
                            <td><?php echo $data->fatherName; ?></td>
                        </tr>
                        <tr>
                            <th>Mother Name</th>
                            <td><?php echo $data->motherName; ?></td>
                        </tr>
                        <tr>
                            <th>Semester</th>
                            <td><?php echo $semesterView->name; ?></td>
                        </tr>
                        <tr>
                            <th>Roll</th>
                            <td><?php echo $data->roll; ?></td>
                        </tr>
                        <tr>
                            <th>Registration</th>
                            <td><?php echo $data->reg; ?></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td><?php echo $departmentView->name; ?></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td><?php echo $genderView->name; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $data->email; ?></td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td><?php echo $data->contact; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $data->address; ?></td>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Footer JS
include_once('include/footerJs.php');
