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
// Show Data use query function
require_once('include/function.php');
$result = showDataAnyTable('semester');
?>

<!-- Html -->
<div class="col-md-9 ps-3 overflow-hidden">
    <a href="semesterAdd.php" class="btn btn-info">+ Add New Semester</a>
    <h2 class="text-center">All Semester</h2>
    <hr>

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
    if (isset($_SESSION['update_data'])) {
    ?>
        <div class="alert alert-success">
            <strong>Success!</strong> <?php echo $_SESSION['update_data']; ?>
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
    <table class="table table-bordered box-shadow">
        <thead>
            <tr>
                <th>SL</th>
                <th>Id</th>
                <th>Semester Name</th>
                <th>Actions</th>
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
                        <td><?php echo $row['semester']; ?></td>
                        <td>
                            <a href="semesterUpdate.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                            <a href="semesterStore.php?id=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                </tbody>
        <?php
            }
        }
        ?>
    </table>
</div>

<?php
// Footer
include_once('include/footer.php');
?>

<?php
// Session Unset
unset($_SESSION['insert_data']);
unset($_SESSION['update_data']);
unset($_SESSION['delete_data']);
unset($_SESSION['delete_error']);
