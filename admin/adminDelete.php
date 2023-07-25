<?php
    // Session Start
    session_start();
?>

<?php
    // Connect DB
    require('include/connect.php');
?>

<?php
    // Delete Admin Table Data
    $data = [];
    if( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ) {
        $id = $_GET['id'];

        // Delete Image
        $deleteImg = "SELECT * FROM admin WHERE id = '$id'";
        $result = $conn -> query( $deleteImg );
        $img = $result -> fetch_assoc();
        $imgLocation = $img['profilePhoto'];

        if( file_exists( $imgLocation ) ) {
            unlink( $imgLocation );
        }

        $deleteSql = "DELETE FROM admin WHERE id = '$id'";

        if( $conn -> query( $deleteSql ) === TRUE ) {
            $_SESSION['delete_success!'] = "Delete Data! id = $id";
            header('location: admin.php');
        } else {
            $_SESSION['delete_error'] = "Delete Error!";
            header('location: admin.php');
        }
    }
?>