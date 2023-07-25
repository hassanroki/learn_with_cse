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
// Header
include_once('include/header.php');
?>

<?php
// Admin Table Data Web Site Showing
$selectSql = "SELECT * FROM admin";
$result = $conn->query($selectSql);
?>

<!-- Html -->
<div class="col-md-9 ps-3 overflow-hidden box-shadow">
    <a href="adminAdd.php" class="btn btn-info">+ Add New Admin</a>
    <hr>
    <div class="box-shadow">
        <h4 class="text-center">All Admin List</h4>

        <?php
        if (isset($_SESSION['insert_data'])) {
        ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $_SESSION['insert_data']; ?>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['delete_success'])) {
        ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $_SESSION['delete_success']; ?>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['delete_error'])) {
        ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $_SESSION['delete_error']; ?>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['img_update'])) {
        ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $_SESSION['img_update']; ?>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['update_data'])) {
        ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $_SESSION['update_data']; ?>
            </div>
        <?php
        }
        ?>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Id</th>
                    <th>Admin Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            // Serial
            $i = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $i++;
            ?>
                    <tbody>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['adminName']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td>
                                <a href="profile.php?id=<?php echo $row['id']; ?>" class="btn btn-info m-2">Profile</a>
                                <a href="adminPhotoEdit.php?id=<?php echo $row['id']; ?>" class="btn btn-primary m-2">Edit Photo</a>
                                <a href="adminUpdate.php?id=<?php echo $row['id']; ?>" class="btn btn-primary m-2">Edit</a>
                                <a href="adminDelete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger m-2" onclick="return confirm('Are You Sure?')">Delete</a>
                            </td>
                        </tr>
                    </tbody>
            <?php
                }
            }
            ?>
        </table>
    </div>
</div>

<?php
// Header
include_once('include/footer.php');
?>

<?php
// Unset Session
unset($_SESSION['insert_data']);
unset($_SESSION['delete_success']);
unset($_SESSION['delete_error']);
unset($_SESSION['img_update']);
unset($_SESSION['update_data']);
?>