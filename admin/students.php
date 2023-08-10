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
// Students Table Data Showing Website
$selectSql = "SELECT * FROM students ORDER BY studentName ASC";
$result = $conn->query($selectSql);
?>

<!-- Html -->
<div class="col-md-9 ps-3 overflow-hidden class-table">
    <a href="studentsAdd.php" class="btn btn-info">+ Add New Students</a>
    <hr>
    <div class="class-table">
        <h4 class="text-center">All Students List</h4>

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

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Id</th>
                    <th>Students Name</th>
                    <th>Students Registration</th>
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
                            <td><?php echo $row['studentName']; ?></td>
                            <td><?php echo $row['reg']; ?></td>
                            <td>
                                <a href="studentsView.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a>
                                <a href="studentsUpdate.php?id=<?php echo $row['id']; ?>" class="btn btn-info">Edit</a>
                                <a href="studentsStore.php?id=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</a>
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
unset($_SESSION['update_data']);
unset($_SESSION['delete_data']);
unset($_SESSION['delete_error']);
