<?php
// Session Start
session_start();
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
// Courses Table Data web site showing
// Function use show query
require_once('include/function.php');
$showData = showDataAnyTable('courses');

?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="coursesAdd.php" class="btn btn-info">Course Add</a>

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
            <strong>Success!</strong> <?php echo $_SESSION['delete_error']; ?>
        </div>
    <?php
    }
    ?>

    <h2 class="text-center">All Course</h2>
    <hr>
    <table class="table table-bordered box-shadow">
        <thead>
            <tr>
                <th>SL</th>
                <th>Id</th>
                <th>Course Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <?php
        if ($showData->num_rows > 0) {
            $i = 0;
            while ($row = $showData->fetch_assoc()) {
                $i++;
        ?>
                <tbody>
                    <tr>
                        <td><?php echo $i;
                            ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo substr($row['description'], 0, 50); ?></td>
                        <td>
                            <a href="coursesView.php?id=<?php echo $row['id']; ?>" class="btn btn-info">View</a>
                            <a href="coursesUpdate.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Update</a>
                            <a href="coursesStore.php?id=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</a>
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
include_once('include/footer.php')
?>

<?php
// Session Unset
unset($_SESSION['data_insert']);
unset($_SESSION['update_data']);
unset($_SESSION['delete_data']);
unset($_SESSION['delete_error']);
