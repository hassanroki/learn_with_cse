<?php
    // Session Start
    session_start();

    // Log Out Use
    if( !isset( $_SESSION['login_success'] ) ) {
        header('location: login.php');
    }
?>

<?php
    // Header
    include_once('include/header.php');
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <h4>Welcome to Admin</h4>
</div>

<?php
    // Header
    include_once('include/footer.php');
?>