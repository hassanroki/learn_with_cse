<?php
    // Session Start
    session_start();
?>


<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header
include_once('include/header.php');
?>


<?php
// Department Table Data Showing Department
$selectDepartment = "SELECT * FROM department";
$result = $conn->query($selectDepartment);
?>

<!-- Html -->
<div class="col-md-9 box-shadow ps-3">
    <a href="teachers.php" class="btn btn-info my-3">Teachers List</a>

    <?php
        if( isset( $_SESSION['email_error'] ) ) {
            ?>
                <div class="alert alert-warning">
                    <strong>Warning!</strong> <?php echo $_SESSION['email_error']; ?>
                </div>
            <?php
        }
    ?>

    <?php
        if( isset( $_SESSION['password_wrong'] ) ) {
            ?>
                <div class="alert alert-warning">
                    <strong>Warning!</strong> <?php echo $_SESSION['password_wrong']; ?>
                </div>
            <?php
        }
    ?>

    <?php
        if( isset( $_SESSION['insert_error'] ) ) {
            ?>
                <div class="alert alert-warning">
                    <strong>Warning!</strong> <?php echo $_SESSION['insert_error']; ?>
                </div>
            <?php
        }
    ?>

    <h2>Add New Teachers</h2>
    <hr>
    <form action="teachersStore.php" class="form" method="post" enctype="multipart/form-data">
        <div class="mt-3">
            <label for="name" class="form-label">Teachers Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name">
        </div>
        <div class="mt-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Your Email">
        </div>
        <div class="mt-3">
            <label for="department" class="form-label">Department</label>
            <select name="department" id="department" class="form-control">
                <option value="">Select Department</option>
                <?php
                if ($result->num_rows > 0) {
                    while ($data = $result->fetch_object()) {
                ?>
                    <option value="<?php echo $data->departmentName; ?>"><?php echo $data->departmentName; ?></option>
                <?php
                    }
                }
                ?>
            </select>
        </div>
        <div class="mt-3">
            <label for="designation" class="form-label">Designation</label>
            <input type="text" name="designation" id="designation" class="form-control" placeholder="Enter Your Designation">
        </div>
        <div class="mt-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Your Password">
        </div>
        <div class="mt-3">
            <label for="confirmPassword" class="form-label">Confirm Password</label>
            <input type="password" name="confirmPassword" id="confirmPassword" class="form-control" placeholder="Enter Your Confirm Password">
        </div>
        <div class="mt-3">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" id="gender" class="form-control">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">female</option>
                <option value="Other">Other</option>
            </select>
        </div>
        <div class="mt-3">
            <label for="contact" class="form-label">Contact</label>
            <input type="number" name="contact" id="contact" class="form-control" placeholder="Enter Your Contact Number">
        </div>
        <div class="mt-3">
            <label for="address" class="form-label">Address</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Your Address">
        </div>
        <div class="mt-3">
            <label for="profile" class="form-label">Photo</label>
            <input type="file" name="profile" id="profile" class="form-control" placeholder="Upload Your Photo">
        </div>
        <div class="mt-3 submit-button">
            <input type="submit" value="Submit" name="insert">
        </div>
    </form>
</div>

<?php
// Footer
include_once('include/footer.php');
?>

<?php
    // Session Unset
    unset($_SESSION['email_error']);
    unset($_SESSION['password_wrong']);
    unset($_SESSION['insert_error']);
?>