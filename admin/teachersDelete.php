<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Delete Teachers Table Data
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Delete Image
    $selectImg = "SELECT * FROM teachers WHERE id = '$id'";
    $resultImg = $conn->query($selectImg);
    $img = $resultImg->fetch_assoc();
    $imgLocation = $img['profile'];

    if (file_exists($imgLocation)) {
        unlink($imgLocation);
    }

    // Delete Users Table Data
    $deleteUsers = "DELETE FROM users WHERE id = '$id'";
    if ($conn->query($deleteUsers) === TRUE) {
    }

    // Users Table Data Delete
    $deleteDataTeachers = "DELETE FROM teachers WHERE id = '$id'";
    if ($conn->query($deleteDataTeachers) === TRUE) {
        $_SESSION['delete_data'] = "Deleted! id = $id";
        header('location: teachers.php');
    } else {
        $_SESSION['delete_error'] = "Delete Failed! id = $id";
        header('location: teachers.php');
    }
}

?>