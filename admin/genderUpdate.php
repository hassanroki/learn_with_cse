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
    // Website Data Show
    $data = [];
    if( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ) {
        $id = $_GET['id'];

        $showData = "SELECT * FROM gender WHERE id = '$id'";
        $result = $conn -> query( $showData );
        
        if( $result -> num_rows == 1 ) {
            $data = $result -> fetch_object();
        }
    }
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="gender.php" class="btn btn-info">All Gender</a>
    <h2 class="text-center">Edit</h2>
    <hr>

    <?php
        if( isset( $_SESSION['update_error'] ) ) {
            ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong> <?php echo $_SESSION['update_error']; ?>
            </div>
            <?php
        }
    ?>

    <form action="genderStore.php" class="form box-shadow submit-button" method="post">
        <div class="mt-3">
            <label for="name" class="form-label">Gender Name</label>
            <input type="text" name="name" id="name" placeholder="Enter Gender Name" class="form-control" value="<?php echo $data -> name; ?>">
            <input type="hidden" name="id" value="<?php echo $data -> id; ?>">
        </div>
        <div class="mt-3">
            <input type="submit" name="update" value="Update">
        </div>
    </form>

</div>

<?php
    // Footer
    include_once('include/footer.php');
?>

<?php
    // Session Unset
    unset( $_SESSION['update_error'] );
?>