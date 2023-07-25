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
// Data Web Site Showing
$selectSql = "SELECT * FROM department ORDER BY id DESC";
$result = $conn->query($selectSql);
?>

<!-- Html -->
<div class="col-md-9 ps-3 overflow-hidden">
    <a href="departmentAdd.php" class="btn btn-info">+ Add New Department</a>
    <hr>
    <div class="class-table">
        <h4 class="text-center">All Department List</h4>
        <?php
        if (isset($_SESSION['data_insert'])) {
        ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $_SESSION['data_insert']; ?>
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

        <?php
        if (isset($_SESSION['update_error'])) {
        ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> <?php echo $_SESSION['update_error']; ?>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['delete_data'])) {
        ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $_SESSION['delete_data']; ?>
            </div>
        <?php
        }
        ?>

        <?php
        if (isset($_SESSION['delete_error'])) {
        ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> <?php echo $_SESSION['delete_error']; ?>
            </div>
        <?php
        }
        ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Id</th>
                    <th>Department Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            $i = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $i++;
            ?>
                    <tbody>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['departmentName']; ?></td>
                            <td>
                                <a href="departmentUpdate.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                                <a href="departmentDelete.php?id=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</a>
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
// Footer
include_once('include/footer.php');
?>

<?php
// Session Unset
unset($_SESSION['data_insert']);
unset($_SESSION['update_data']);
unset($_SESSION['update_error']);
unset($_SESSION['delete_data']);
unset($_SESSION['delete_error']);
?>