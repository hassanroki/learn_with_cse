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
require_once('include/function.php');

$showCategories = showDataAnyTable('categories');

?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="categoriesAdd.php" class="btn btn-info">Add Categories</a>
    <h2 class="text-center">All Categories List</h2>
    <hr>

    <?php
    if (isset($_SESSION['insert_data'])) {
    ?>
        <div class="alert alert-success">
            <strong>Success!</strong><?php echo $_SESSION['insert_data']; ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['update_data'])) {
    ?>
        <div class="alert alert-success">
            <strong>Success!</strong><?php echo $_SESSION['update_data']; ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['delete_data'])) {
    ?>
        <div class="alert alert-success">
            <strong>Success!</strong><?php echo $_SESSION['delete_data']; ?>
        </div>
    <?php
    }
    ?>

    <?php
    if (isset($_SESSION['delete_error'])) {
    ?>
        <div class="alert alert-warning">
            <strong>Warning!</strong><?php echo $_SESSION['delete_error']; ?>
        </div>
    <?php
    }
    ?>

    <table class="table table-bordered box-shadow">
        <thead>
            <tr>
                <th>SL</th>
                <th>Id</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            <?php
            if ($showCategories->num_rows > 0) {
                $i = 0;
                while ($row = $showCategories->fetch_assoc()) {
                    $i++;
            ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['name']; ?></td>
                        <td>
                            <a href="categoriesUpdate.php?id=<?php echo $row['id']; ?>" class="btn btn-success">Edit</a>
                            <a href="categoriesStore.php?id=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>

    </table>
</div>

<?php
// Footer
include_once('include/footer.php')
?>

<?php
// Session Unset
unset($_SESSION['insert_data']);
unset($_SESSION['update_data']);
unset($_SESSION['delete_data']);
unset($_SESSION['delete_error']);