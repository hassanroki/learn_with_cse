<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header CSS Fonts
include_once('include/headerCssFonts.php');
?>

<?php
// Teachers Table Data Showing Website
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $showTeachersData = "SELECT * FROM teachers WHERE id = '$id'";
    $result = $conn->query($showTeachersData);

    if ($result->num_rows > 0) {
        $data = $result->fetch_object();
    }
}
if( $data == null ){
    header('location: teachers.php');
}
?>

<?php
// Department Table Data Showing Department
$showDepartment = "SELECT * FROM department";
$result = $conn->query($showDepartment);
?>

<!-- Html -->
<div class="teachers-update">
    <div class="container">
        <div class="row">
            <a href="teachers.php" class="btn btn-info my-3">Teachers List</a>
            <h2>Update Teachers</h2>
            <hr>
            <form action="teachersStore.php" class="form box-shadow submit-button" method="post" enctype="multipart/form-data">
                <div class="mt-3">
                    <label for="name" class="form-label">Teachers Name</label>
                    <input type="text" name="name" id="name" value="<?php echo $data->name; ?>" class="form-control">
                    <input type="hidden" name="id" value="<?php echo $data->id; ?>">
                </div>
                <div class="mt-3">
                    <label for="department" class="form-label">Department</label>
                    <select name="department" id="department" class="form-control">
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $row['departmentName']; ?>" selected><?php echo $row['departmentName']; ?></option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" name="designation" id="designation" value="<?php echo $data->designation; ?>" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="gender" class="form-label">Gender</label>
                    <select name="gender" id="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="number" name="contact" id="contact" value="<?php echo $data->contact; ?>" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo $data->address; ?>" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="profile" class="form-label">Photo</label>
                    <input type="file" name="profile" id="profile" class="form-control" required>
                    <img src="<?php echo $data -> profile; ?>" alt="profile" width="100px" class="img-fluid rounded">
                </div>
                <div class="mt-3">
                    <input type="submit" value="Update" name="update">
                </div>
            </form>
        </div>
    </div>
</div>

<?php
// Header JS
include_once('include/footerJs.php');
?>