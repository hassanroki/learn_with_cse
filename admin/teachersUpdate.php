<?php
// Session Start
session_start();

// Connect DB
require('include/connect.php');

// Header CSS Fonts
include_once('include/headerCssFonts.php');

// Query Function
require_once('include/function.php');

// Teachers Table Data Showing Website
$teachers = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $teachersData = selectAnyTableWhereId('teachers', $id);

    if ($teachersData->num_rows > 0) {
        $teachers = $teachersData->fetch_object();
    }
}
if( $teachers == null ){
    header('location: teachers.php');
}

// Departments Table Data Showing
$departmentId = $teachers -> departmentId;
$departments = selectAnyTableWhereId('departments', 'id', $departmentId);

// Genders Table Data Showing Website
$genderId = $teachers -> genderId;
$genders = selectAnyTableWhereId('genders', 'id', $genderId);

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
                    <input type="text" name="name" id="name" value="<?php echo $teachers->name; ?>" class="form-control">
                    <input type="hidden" name="id" value="<?php echo $teachers->id; ?>">
                </div>
                <div class="mt-3">
                    <label for="departmentId" class="form-label">Department</label>
                    <select name="departmentId" id="departmentId" class="form-control">
                        <?php
                            while ($row = $departments->fetch_assoc()) {
                        ?>
                                <option value="<?php echo $row['id']; ?>" selected><?php echo $row['name']; ?></option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="designation" class="form-label">Designation</label>
                    <input type="text" name="designation" id="designation" value="<?php echo $teachers->designation; ?>" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="genderId" class="form-label">Gender</label>
                    <select name="genderId" id="genderId" class="form-control" required>
                        <option value="">Select Gender</option>
                        <?php
                            while( $data = $genders -> fetch_object() ) {
                                ?>
                                <option value="<?php echo $data -> id; ?>"><?php echo $data -> name; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="mt-3">
                    <label for="contact" class="form-label">Contact</label>
                    <input type="number" name="contact" id="contact" value="<?php echo $teachers->contact; ?>" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" name="address" id="address" value="<?php echo $teachers->address; ?>" class="form-control">
                </div>
                <div class="mt-3">
                    <label for="profile" class="form-label">Photo</label>
                    <input type="file" name="profile" id="profile" class="form-control" required>
                    <img src="<?php echo $teachers -> profile; ?>" alt="profile" width="100px" class="img-fluid rounded">
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
