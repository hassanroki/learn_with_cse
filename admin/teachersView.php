<?php
// Session Start
session_start();

// Log Out Use
if (!isset($_SESSION['login_success'])) {
    header('location: login.php');
}

// Connect DB
require('include/connect.php');

// Header CSS Fonts
include_once('include/headerCssFonts.php');

// Query Function
require_once('include/function.php');

// Students Viewing
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $teachersData = selectAnyTableWhereId('teachers', $id);

    if ($teachersData->num_rows == 1) {
        $teachers = $teachersData->fetch_object();

        $departmentId = $teachers -> departmentId;
        $departmentData = selectAnyTableWhereId('departments', $departmentId);
        $departments = $departmentData -> fetch_object();

        $genderId = $teachers -> genderId;
        $genderData = selectAnyTableWhereId('genders', $genderId);
        $genders = $genderData -> fetch_object();
    }
}
?>

<!-- Html -->
<div class="teachers-view py-5">
    <div class="container">
        <div class="row">
            <a href="teachers.php" class="btn btn-info text-center">Teachers List</a>
            <hr>
            <div class="col-md-4 pe-3 box-shadow">
                <h2 class="text-center"><?php echo $teachers->name; ?></h2>
                <img src="<?php echo $teachers->profile; ?>" alt="img" class="img-fluid rounded">
            </div>
            <div class="col-md-8 ps-3 box-shadow">
                <h2 class="text-center">Details</h2>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <td><?php echo $teachers->id; ?></td>
                        </tr>
                        <tr>
                            <th>User ID</th>
                            <td><?php echo $teachers->userId; ?></td>
                        </tr>
                        <tr>
                            <th>Teachers Name</th>
                            <td><?php echo $teachers->name; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $teachers->email; ?></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td><?php echo $departments->name; ?></td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td><?php echo $teachers->designation; ?></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td><?php echo $genders->name; ?></td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td><?php echo $teachers ->contact; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $teachers->address; ?></td>
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
