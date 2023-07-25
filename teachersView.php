<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Header CSS Fonts
include_once('include/headerCssFonts.php');
?>

<?php
// Teachers Table Data Web site showing
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $showData = "SELECT * FROM teachers WHERE id = '$id'";
    $result = $conn->query($showData);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
    }
}
?>

<!-- Html -->
<div class="teachers-view">
    <div class="container">
        <div class="row">
            <a href="teachers.php" class="btn btn-info my-3">Teachers List</a>
            <div class="col-md-4 box-shadow">
                <h4 class="text-center"><?php echo $row['name']; ?></h4>
                <img src="upload/<?php echo $row['profile']; ?>" alt="profile" class="img-fluid rounded">
            </div>
            <div class="col-md-8">
                <h4 class="text-center">Details</h4>
                <table class="table table-bordered box-shadow">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $row['name']; ?></td>
                        </tr>
                        <tr>
                            <th>Id</th>
                            <td><?php echo $row['id']; ?></td>
                        </tr>
                        <tr>
                            <th>users Id</th>
                            <td><?php echo $row['userId']; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $row['email']; ?></td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td><?php echo $row['designation']; ?></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td><?php echo $row['department']; ?></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td><?php echo $row['gender']; ?></td>
                        </tr>
                        <tr>
                            <th>Contact</th>
                            <td><?php echo $row['contact']; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $row['address']; ?></td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
// Footer JS
include_once('include/footerJs.php');
?>