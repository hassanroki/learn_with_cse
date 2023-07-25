<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// // Create Table Then Comment Out
// $createSql = "CREATE TABLE admin( id INT(11) PRIMARY KEY AUTO_INCREMENT, adminName VARCHAR(255), email VARCHAR(55), password VARCHAR(55), contact VARCHAR(80), address VARCHAR(255), profilePhoto VARCHAR(255) )";

// if( $conn -> query( $createSql ) === TRUE ) {
//     echo "Create Table Success!";
// } else {
//     echo ("Create Table Failed!");
// }


// Insert Data to Table
if (isset($_POST['insert']) && !empty($_POST['adminName']) && !empty($_POST['email'])) {
    $adminName = $_POST['adminName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Duplicate Email Check
    $emailCheck = "SELECT * FROM admin WHERE email = '$email'";
    $result = $conn->query($emailCheck);

    if ($result->num_rows == 1) {
        $_SESSION['email_exits'] = "Already Email Exits!";
        header('location: adminAdd.php');
    } elseif ($password != $confirmPassword) {
            $_SESSION['password_wrong'] = "Password and Confirm Password Don't Match";
            header('location: adminAdd.php');
    } else {
        // Profile Photo
        $target_dir = "../upload/";
        if ($_FILES['profilePhoto']) {
            $file_upload = $target_dir . time() . "_" . basename($_FILES['profilePhoto']['name']);
            move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $file_upload);
        }

        $insertSql = "INSERT INTO admin( adminName, email, password, contact, address, profilePhoto ) VALUES( '$adminName', '$email', '$password', '$contact', '$address', '$file_upload' )";

        if ($conn->query($insertSql) === TRUE) {
            $_SESSION['insert_data'] = "Inserted Data!";
            header('location: admin.php');
        } else {
            $_SESSION['insert_error'] = "Insert Error!";
            header('location: adminAdd.php');
        }
    }
}

?>

<?php
// Update Photo
if (isset($_POST['imgUpdate'])) {
    $id = $_POST['id'];

    // Delete Image
    $selectImg = "SELECT * FROM admin WHERE id = '$id'";
    $resultImg = $conn->query($selectImg);
    $img = $resultImg->fetch_assoc();
    $imgLocation = $img['profilePhoto'];

    if (file_exists($imgLocation)) {
        unlink($imgLocation);
    } 

    // Image Upload
    $target_dir = "../upload/";
    if (isset($_FILES['profilePhoto'])) {
        $file_upload = $target_dir . time() . "_" . basename($_FILES['profilePhoto']['name']);
        move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $file_upload);
    }

    // Update 
    $updateSql = "UPDATE admin SET profilePhoto = '$file_upload' WHERE id = '$id'";

    if( $conn -> query( $updateSql ) === TRUE ) {
        $_SESSION['img_update'] = "Updated Data! id = $id";
        header('location: admin.php');
    } else {
        $_SESSION['img_error'] = "Update Error! id = $id";
        header('location: adminPhotoEdit.php');
    }
}
?>

<?php
    // Admin Update
    if( isset( $_POST['update'] ) && !empty( $_POST['adminName'] ) && !empty( $_POST['contact'] ) ) {
        $id = $_POST['id'];
        $adminName = $_POST['adminName'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];


        $adminUpdate = "UPDATE admin SET adminName = '$adminName', contact = '$contact', address = '$address' WHERE id = '$id'";

        if( $conn -> query( $adminUpdate ) === TRUE ) {
            $_SESSION['update_data'] = "Update Data! id = $id";
            header('location: admin.php');
        } else {
            $_SESSION['update_error'] = "Update Fail! id = $id";
            header('location: adminUpdate.php');
        }
    }
?>