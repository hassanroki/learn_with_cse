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
    // Show Data Subjects Table
    // Connect Function Because This is Query Show Data
    require_once('include/function.php');
    $subjectsTableDataShow = showDataAnyTable( 'subjects' );
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="subjectsAdd.php" class="btn btn-info">Add Subjects</a>
    <h2 class="text-center">All Subjects</h2>
    <hr>

    <?php
        if( isset( $_SESSION['insert_data'] ) ) {
            ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $_SESSION['insert_data']; ?>
            </div>
            <?php
        }
    ?>

    <?php
        if( isset( $_SESSION['update_data'] ) ) {
            ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $_SESSION['update_data']; ?>
            </div>
            <?php
        }
    ?>

    <?php
        if( isset( $_SESSION['delete_data'] ) ) {
            ?>
            <div class="alert alert-success">
                <strong>Success!</strong> <?php echo $_SESSION['delete_data']; ?>
            </div>
            <?php
        }
    ?>
    
    <?php
        if( isset( $_SESSION['delete_error'] ) ) {
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
                <th>Course Code</th>
                <th>Course Title</th>
                <th>Credit</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if( $subjectsTableDataShow -> num_rows > 1 ) {
                    $i = 1;
                    while( $row = $subjectsTableDataShow -> fetch_assoc() ) {
                        ?>
                        <tr>
                            <td> <?php echo $i++; ?></td>
                            <td> <?php echo $row['id']; ?></td>
                            <td> <?php echo $row['courseCode']; ?></td>
                            <td> <?php echo $row['courseTitle']; ?></td>
                            <td> <?php echo $row['credit']; ?></td>
                            <td>
                                <a href="subjectsView.php?id=<?php echo $row['id']; ?>" class="btn btn-info">View</a>
                                <a href="subjectsUpdate.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">Edit</a>
                                <a href="subjectsStore.php?id=<?php echo $row['id']; ?>" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                }
            ?>
        </tbody>
    </table>

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
