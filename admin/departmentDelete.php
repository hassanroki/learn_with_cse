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
// Delete Data
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $deleteSql = "DELETE FROM department WHERE id = '$id'";

    if ($conn->query($deleteSql)) {
        $_SESSION['delete_data'] = "Data Deleted! id = $id";
        header('location: department.php');
    } else {
        $_SESSION['delete_error'] = "Delete Fail! id = $id";
        header('location: department.php');
    }
}
?>