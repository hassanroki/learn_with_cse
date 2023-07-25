<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// // Create Registration Table Then Comment Out
// $createTable = "CREATE TABLE getUsers( id INT(11) AUTO_INCREMENT PRIMARY KEY, usersName VARCHAR(80), email VARCHAR(80), password VARCHAR(20) )";

// if( $conn -> query( $createTable ) === TRUE ) {
//     echo "Create Table Successfully!";
// } else {
//     echo ( "Create Table Failed!" ) . $conn -> connect_error;
// }  

// Insert Data
if (isset($_POST['registration']) && !empty($_POST['usersName']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $usersName = $_POST['usersName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);

    // Duplicate password check
    if ($password != $confirmPassword) {
        $_SESSION['password_wrong'] = "Password and Confirm Password Doesn't Match";
        header('location: registration.php');
    }

    // Duplicate Email Check
    $checkEmail = "SELECT * FROM getUsers WHERE email = '$email'";
    $emailResult = $conn->query($checkEmail);
    if ($emailResult->num_rows == 1) {
        $_SESSION['email_exits'] = "Email Already Exits!";
        header('location: registration.php');
    } else {
        $insertSql = "INSERT INTO getUsers( usersName, email, password ) VALUES( '$usersName', '$email', '$password' )";

        if ($conn->query($insertSql) === TRUE) {
            $_SESSION['insert_data'] = "Data Insert Successfully!";
            header('location: login.php');
        } else {
            $_SESSION['insert_error'] = "Data Insert Failed!";
            header('location: registration.php');
        }
    }
}

?>
