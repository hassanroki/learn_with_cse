<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// // Create Teachers Table Then Comment Out
// $createTable = "CREATE TABLE teachers( id INT(11) PRIMARY KEY AUTO_INCREMENT, userId INT(11), name VARCHAR(80), email VARCHAR(80), department VARCHAR(80), designation VARCHAR(255), password VARCHAR(255), gender VARCHAR(30), contact INT(11), address VARCHAR(255), profile VARCHAR(255) )";

// if( $conn -> query( $createTable ) === TRUE ) {
//     echo "Table Create Successfully!";
// } else {
//     echo ("Table Create Error!") . $conn -> connect_error;
// }



// Insert Data to Teachers Table
if (isset($_POST['insert']) && !empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['department']) && !empty($_POST['designation']) && !empty($_POST['contact'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    global $conn;

    // Check Duplicate Email
    $checkEmail = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows == 1) {
        $_SESSION['email_error'] = "Already Email Exits";
        header('location: teachersAdd.php');
    } elseif ($password != $confirmPassword) {
        $_SESSION['password_wrong'] = "Password & Confirm Password Doesn't Match!";
        header('location: teachersAdd.php');
    } else {
        global $conn;
        // Profile Photo
        $target_dir = "../upload/";
        if (isset($_FILES['profile'])) {
            $fileUpload = $target_dir . time() . "_" . basename($_FILES['profile']['name']);
            move_uploaded_file($_FILES['profile']['tmp_name'], $fileUpload);
        }

        // Users Data Add
        $usersSql = "INSERT INTO users( roles_id, name, email, password ) VALUES( '3', '$name', '$email', '$password' )";

        if ($conn->query($usersSql) === TRUE) {
            $userId = $conn->insert_id;
        }

        // Teachers Data Add
        $teachersSql = "INSERT INTO teachers( userId, name, email, department, designation, password, gender, contact, address, profile ) VALUES( '$userId', '$name', '$email', '$department', '$designation', '$password', '$gender', '$contact', '$address', '$fileUpload' )";

        if ($conn->query($teachersSql) === TRUE) {
            $_SESSION['insert_data'] = "Data Insert Success!";
            header('location: teachers.php');
        } else {
            $_SESSION['insert_error'] = "Data Insert Failed!";
            header('location: teachersAdd.php');
        }
    }
}


// Teachers Table Data Update
$data = [];
if (isset($_POST['update']) && !empty($_POST['name'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $department = $_POST['department'];
    $designation = $_POST['designation'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Image Delete
    $deleteImg = "SELECT * FROM teachers WHERE id = '$id'";
    $resultImg = $conn->query($deleteImg);
    $imgRow = $resultImg->fetch_assoc();
    $imgLocation = $imgRow['profile'];

    if (file_exists($imgLocation)) {
        unlink($imgLocation);
    }

    // Upload Image
    $target_dir = "../upload/";
    if ($_FILES['profile']) {
        $fileUpload = $target_dir . time() . "_" . basename( $_FILES['profile']['name'] );
        move_uploaded_file( $_FILES['profile']['tmp_name'], $fileUpload );
    }

    // Update Data
    $updateSql = "UPDATE teachers SET name = '$name', department = '$department', designation = '$designation', gender = '$gender', contact = '$contact', address = '$address', profile = '$fileUpload' WHERE id = '$id'";

    if( $conn -> query( $updateSql ) === TRUE ) {
        $_SESSION['update_data'] = "Update Data";
        header('location: teachers.php');
    } else {
        $_SESSION['update_error'] = "Update Failed!";
        header('location: teachers.php');
    }
}

?>