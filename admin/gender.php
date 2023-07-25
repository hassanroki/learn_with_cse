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
// Gender Table Data Website Showing
$showData = "SELECT * FROM gender";
$result = $conn->query($showData);
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="genderAdd.php" class="btn btn-info">Add Gender</a>
    <h2 class="text-center">All Gender</h2>
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
                <th>Gender</th>
                <th>Actions</th>
            </tr>
        </thead>
        <?php
        if ($result->num_rows > 0) {
            $i = 0;
            while ($row = $result->fetch_assoc()) {
                $i++;
        ?>
                <tbody>
                    <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $row['name']; ?> </td>
                        <td>
                            <a href="genderUpdate.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                            <a href="genderStore.php?id=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</a>
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
// Unset Session
unset($_SESSION['insert_data']);
unset($_SESSION['update_data']);
unset($_SESSION['delete_data']);
unset($_SESSION['delete_error']);
?>