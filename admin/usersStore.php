<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// // Create Users Table Then Comment Out
// $createTable = "CREATE TABLE users( id INT(11) PRIMARY KEY AUTO_INCREMENT, roles_id INT(11), name VARCHAR(255), email VARCHAR(255), password VARCHAR(50) )";

// if( $conn -> query( $createTable ) === TRUE ) {
//     echo "Create Table Success!";
// } else {
//     echo ("Table Create Failed!") . $conn -> error;
// }

// Insert Data
if (isset($_POST['insert']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['password'])) {
    $roles_id = $_POST['roles_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);

    // Duplicate password check
    if ($password != $confirmPassword) {
        $_SESSION['password_wrong'] = "Password and Confirm Password Doesn't Match";
        header('location: usersAdd.php');
    }

    // Duplicate Email Check
    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $emailResult = $conn->query($checkEmail);
    if ($emailResult->num_rows == 1) {
        $_SESSION['email_error'] = "Email Already Exits!";
        header('location: usersAdd.php');
    } else {
        $insertSql = "INSERT INTO users( roles_id, name, email, password ) VALUES( '$roles_id', '$name', '$email', '$password' )";

        if ($conn->query($insertSql) === TRUE) {
            $_SESSION['insert_data'] = "Data Insert Successfully!";
            header('location: users.php');
        } else {
            $_SESSION['insert_fail'] = "Data Insert Failed!";
            header('location: usersAdd.php');
        }
    }
}

?>
