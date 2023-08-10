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

?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="genders.php" class="btn btn-info">All Gender</a>
    <h2 class="text-center">Add New Gender</h2>
    <hr>

    <?php
        if( isset( $_SESSION['insert_error'] ) ) {
            ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> <?php echo $_SESSION['insert_error']; ?>
            </div>
            <?php
        }
    ?>

    <?php
        if( isset( $_SESSION['name_exits'] ) ) {
            ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> <?php echo $_SESSION['name_exits']; ?>
            </div>
            <?php
        }
    ?>

    <form action="gendersStore.php" class="form box-shadow submit-button" method="post">
        <div class="mt-3">
            <label for="name" class="form-label">Gender Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Gender Name" class="form-control">
        </div>
        <div class="mt-3">
            <input type="submit" name="insert" value="Submit">
        </div>
    </form>

</div>

<?php
    // Footer
    include_once('include/footer.php');
?>

<?php
    // Session Unset
    unset( $_SESSION['insert_error'] );
    unset( $_SESSION['name_exits'] );
