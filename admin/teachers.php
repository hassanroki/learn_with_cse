<?php
// Session Start
session_start();

// Log Out Use
if (!isset($_SESSION['login_success'])) {
    header('location: login.php');
}

// Connect DB
require('include/connect.php');

// Header
include_once('include/header.php');

// Query Function
require_once('include/function.php');

// Teachers Table Website Showing
$teachers = showDataAnyTable('teachers');

?>

<!-- Html -->
<div class="col-md-9 ps-3 overflow-hidden">
    <a href="teachersAdd.php" class="btn btn-info">+ Add New Teachers</a>
    <hr>
    <div class="box-shadow">
        <h4 class="text-center">All Teachers List</h4>

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

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>SL</th>
                    <th>Id</th>
                    <th>Teachers Name</th>
                    <th>Designation</th>
                    <th>Action</th>
                </tr>
            </thead>
            <?php
            if ($teachers->num_rows > 0) {
                $i = 0;
                while ($data = $teachers->fetch_object()) {
                    $i++;
            ?>
                    <tbody>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data->id; ?></td>
                            <td><?php echo $data->name; ?></td>
                            <td><?php echo $data->designation; ?></td>
                            <td>
                                <a href="teachersView.php?id=<?php echo $data->id; ?>" class="btn btn-info">View</a>
                                <a href="teachersUpdate.php?id=<?php echo $data->id; ?>" class="btn btn-info">Edit</a>
                                <a href="teachersStore.php?id=<?php echo $data->id; ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</a>
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
// Session Unset
unset($_SESSION['insert_data']);
unset($_SESSION['delete_data']);
unset($_SESSION['delete_error']);
unset($_SESSION['update_data']);
unset($_SESSION['update_error']);
