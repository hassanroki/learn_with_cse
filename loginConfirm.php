<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// Login System
$email = $_POST['email'];
$password = md5($_POST['password']);

// Condition
$loginSql = "SELECT * FROM users WHERE email = '$email' and password = '$password'";
$result = $conn->query($loginSql);

if ($result->num_rows == 1) {
    $data = $result -> fetch_object();
    $_SESSION['roles_id'] = $data -> roles_id;
    $_SESSION['name'] = $data -> name;
    header('location: index.php');
} else {
    $_SESSION['login_error'] = "Email or Password Doesn't Match!";
    header('location: login.php');
}

?>