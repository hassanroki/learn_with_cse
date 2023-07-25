<?php
// Session Start
session_start();

// Log Out Use
if (!isset($_SESSION['login_success'])) {
    header('location: login.php');
}
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
// Students Viewing
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $selectSql = "SELECT * FROM teachers WHERE id = '$id'";
    $result = $conn->query($selectSql);

    if ($result->num_rows == 1) {
        $data = $result->fetch_object();
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
                <h2 class="text-center"><?php echo $data->name; ?></h2>
                <img src="<?php echo $data->profile; ?>" alt="img" class="img-fluid rounded">
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
                            <th>User ID</th>
                            <td><?php echo $data->userId; ?></td>
                        </tr>
                        <tr>
                            <th>Teachers Name</th>
                            <td><?php echo $data->name; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $data->email; ?></td>
                        </tr>
                        <tr>
                            <th>Department</th>
                            <td><?php echo $data->department; ?></td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td><?php echo $data->designation; ?></td>
                        </tr>
                        <tr>
                            <th>Gender</th>
                            <td><?php echo $data->gender; ?></td>
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
?>