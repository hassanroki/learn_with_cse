<?php
    // Session Start
    session_start();
?>

<?php
    // Header
    include_once('include/header.php');
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="categories.php" class="btn btn-info">All Categories List</a>
    <h2 class="text-center">Add Categories</h2>
    <hr>

    <?php
        if( isset( $_SESSION['insert_error'] ) ) {
            ?>
            <div class="alert alert-warning">
                <strong>Warning!</strong><?php echo $_SESSION['insert_error']; ?>
            </div>
            <?php
        }
    ?>

    <form action="categoriesStore.php" class="form bax-shadow submit-button" method="post">
        <div class="mt-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter Category Name">
        </div>
        <div class="mt-3">
            <input type="submit" value="Submit" name="insert">
        </div>
    </form>
</div>

<?php
    // Footer
    include_once('include/footer.php')
?>

<?php
    // Unset Session
    unset( $_SESSION['insert_error'] );
?>