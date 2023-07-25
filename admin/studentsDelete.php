<?php
// Session Start
session_start();

// Log Out Use
if (!isset($_SESSION['login_success'])) {
    header('location: login.php');
}
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Students Table Data Delete
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Delete Image
    $selectImg = "SELECT * FROM students WHERE id = '$id'";
    $resultImg = $conn->query($selectImg);
    $img = $resultImg->fetch_assoc();
    $imgLocation = $img['profilePhoto'];

    if (file_exists($imgLocation)) {
        unlink($imgLocation);
    }

    // Delete Students Table Data
    $deleteSql = "DELETE FROM students WHERE id = '$id'";
    if ($conn->query($deleteSql) === TRUE) {
        $_SESSION['delete_data'] = "Deleted Data! id = $id";
        header('location: students.php');
    } else {
        $_SESSION['delete_error'] = "Delete Error id = $id";
        header('location: students.php');
    }

}
?>