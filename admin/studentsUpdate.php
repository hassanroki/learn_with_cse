<?php
// Session Start
session_start();

// Log Out Use
if (!isset($_SESSION['login_success'])) {
    header('location: login.php');
}
?>

<?php
// Header
include_once('include/headerCssFonts.php');
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Students Table Data Showing Website
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $selectStudents = "SELECT * FROM students WHERE id = '$id'";
    $result = $conn->query($selectStudents);

    if ($result->num_rows == 1) {
        $data = $result->fetch_object();
    }
}
?>

<?php
// Semester table data semester showing website
$selectSql = "SELECT * FROM semester";
$result = $conn->query($selectSql);
?>

<!-- Html -->
<div class="students-update py-5">
    <div class="container">
        <div class="row box-shadow submit-button">
            <a href="students.php" class="btn btn-info px-3">Students List</a>
            <h2 class="text-center">Update Students</h2>
            <?php
            if (isset($_SESSION['update_error'])) {
            ?>
                <div class="alert alert-warning">
                    <strong>Warning!</strong> <?php echo $_SESSION['update_error']; ?>
                </div>
            <?php
            }
            ?>
            <hr>
            <div class="box-shadow">
                <form action="studentsStore.php" class="form" method="post" enctype="multipart/form-data">
                    <div class="mt-3">
                        <label for="studentName" class="form-label">Student Name</label>
                        <input type="text" name="studentName" id="studentName" class="form-control" value="<?php echo $data->studentName; ?>" required>
                        <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="fatherName" class="form-label">Father Name</label>
                        <input type="text" name="fatherName" id="fatherName" class="form-control" value="<?php echo $data->fatherName; ?>" required>
                    </div>
                    <div class="mt-3">
                        <label for="motherName" class="form-label">Mother Name</label>
                        <input type="text" name="motherName" id="motherName" class="form-control" value="<?php echo $data->motherName; ?>" required>
                    </div>
                    <div class="mt-3">
                        <label for="semester" class="form-label">Semester</label>
                        <select name="semester" id="semester" class="form-select">
                            <option value="" selected>Select Class</option>
                            <?php
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                            ?>
                                    <option value="<?php echo $row['semester'] ?>" selected><?php echo $row['semester'] ?></option>
                            <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" name="age" id="age" class="form-control" value="<?php echo $data->age; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-select">
                            <option value="<?php echo $data->gender; ?>" selected><?php echo $data->gender; ?></option>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="number" name="contact" id="contact" class="form-control" value="<?php echo $data->contact; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $data->address; ?>">
                    </div>
                    <div class="mt-3">
                        <label for="profilePhoto" class="form-label">Profile Photo</label>
                        <input type="file" name="profilePhoto" id="profilePhoto" class="form-control" required>
                        <img src="<?php echo $data->profilePhoto; ?>" alt="" class="img-fluid" width="100px">
                    </div>
                    <input type="submit" value="Submit" name="update" class="mt-3">
                </form>
            </div>
        </div>
    </div>
</div>

<?php
// Footer
include_once('include/footerJs.php');
?>

<?php
// Unset Session
unset($_SESSION['update_error']);

?>