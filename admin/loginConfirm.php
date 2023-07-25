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
    $loginSql = "SELECT * FROM admin WHERE email = '$email' and password = '$password'";
    $result = $conn -> query( $loginSql );

    if( $result -> num_rows == 1 ) {
        $_SESSION['login_success'] = "Welcome Login!";
        header('location: index.php');
    } else {
        $_SESSION['login_error'] = "Email or Password Doesn't Match!";
        header('location: login.php');
    }
?>