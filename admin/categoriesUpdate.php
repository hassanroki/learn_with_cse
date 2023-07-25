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
    // View Data So connect Function File
    require_once('include/function.php');

    // Categories Table Data Showing
    $data = [];
    if( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ) {
        $id = $_GET['id'];

        $result = selectAnyTableWhereId( 'categories', $id );
        
        if( $result -> num_rows == 1 ) {
            $data = $result -> fetch_object();
        }
    }

    if( $data == null ) {
        header('location: categories.php');
    }
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="categories.php" class="btn btn-info">All Categories List</a>
    <h2 class="text-center">Edit <?php echo $data -> name; ?></h2>
    <hr>

    <?php
        if( isset( $_SESSION['update_error'] ) ) {
            ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong><?php echo $_SESSION['update_error']; ?>
            </div>
            <?php
        }
    ?>

    <form action="categoriesStore.php" class="form bax-shadow submit-button" method="post">
        <div class="mt-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name" value="<?php echo $data -> name; ?>">
            <input type="hidden" name="id" value="<?php echo $data -> id; ?>">
        </div>
        <div class="mt-3">
            <input type="submit" value="Update" name="update">
        </div>
    </form>
</div>

<?php
    // Footer
    include_once('include/footer.php')
?>

<?php
    // Unset Session
    unset( $_SESSION['update_error'] );
