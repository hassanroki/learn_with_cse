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
include_once('include/header.php');
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// class table data showing website
$selectSql = "SELECT * FROM class";
$result = $conn->query($selectSql);
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="students.php" class="btn btn-info px-3">Students List</a>
    <hr>
    <h2 class="text-center">Add New Students</h2>

    <?php
    if (isset($_SESSION['email_exits'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['email_exits']; ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['password_wrong'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['password_wrong']; ?>
        </div>
    <?php
    }
    ?>

    <?php

    if (isset($_SESSION['insert_error'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong> <?php echo $_SESSION['insert_error']; ?>
        </div>
    <?php
    }
    ?>

    <div class="box-shadow submit-button">
        <form action="studentsStore.php" class="form" method="post" enctype="multipart/form-data">
            <div class="mt-3">
                <label for="studentName" class="form-label">Student Name</label>
                <input type="text" name="studentName" id="studentName" class="form-control" placeholder="Enter Student Name" required>
            </div>
            <div class="mt-3">
                <label for="fatherName" class="form-label">Father Name</label>
                <input type="text" name="fatherName" id="fatherName" class="form-control" placeholder="Enter Father Name" required>
            </div>
            <div class="mt-3">
                <label for="motherName" class="form-label">Mother Name</label>
                <input type="text" name="motherName" id="motherName" class="form-control" placeholder="Enter Mother Name" required>
            </div>
            <div class="mt-3">
                <label for="className" class="form-label">class</label>
                <select name="className" id="className" class="form-select">
                    <option value="" selected>Select Class</option>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                    ?>
                            <option value="<?php echo $row['className']; ?>"><?php echo $row['className']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="mt-3">
                <label for="age" class="form-label">Age</label>
                <input type="text" name="age" id="age" class="form-control" placeholder="Enter Age">
            </div>
            <div class="mt-3">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" class="form-select">
                    <option value="" selected>Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="mt-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="mt-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="mt-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Enter Confirm Password">
            </div>
            <div class="mt-3">
                <label for="contact" class="form-label">Contact</label>
                <input type="number" name="contact" id="contact" class="form-control" placeholder="Enter Contact">
            </div>
            <div class="mt-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address">
            </div>
            <div class="mt-3">
                <label for="profilePhoto" class="form-label">Profile Photo</label>
                <input type="file" name="profilePhoto" id="profilePhoto" class="form-control">
            </div>
            <input type="submit" value="Submit" name="insert" class="mt-3">
        </form>
    </div>
</div>

<?php
// Footer
include_once('include/footer.php');
?>

<?php
// Unset Session
unset($_SESSION['email_exits']);
unset($_SESSION['password_wrong']);
unset($_SESSION['insert_error']);
?>