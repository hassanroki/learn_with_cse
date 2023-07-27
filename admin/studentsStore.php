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
// $createTable = "CREATE TABLE students( id INT(11) PRIMARY KEY AUTO_INCREMENT, userId INT(11), studentName VARCHAR(80), fatherName VARCHAR(80), motherName VARCHAR(80), semesterId VARCHAR(80), roll INT(11), reg INT(11), departmentId INT(11), age VARCHAR(30), gender VARCHAR(50), email VARCHAR(80), password VARCHAR(50), contact VARCHAR(50), address VARCHAR(255), profilePhoto VARCHAR(255) )";


// if( $conn -> query( $createTable ) === TRUE ) {
//     echo "Created Table!";
// } else {
//     echo ("Table Create Failed!") . $conn -> error;
// }

// Inset Data Table 

if (isset($_POST['insert']) && !empty($_POST['studentName']) && !empty($_POST['fatherName']) && !empty($_POST['motherName']) && !empty($_POST['semesterId']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['contact'])) {
    $studentName = $_POST['studentName'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $semesterId = $_POST['semesterId'];
    $roll = $_POST['roll'];
    $reg = $_POST['reg'];
    $departmentId = $_POST['departmentId'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $confirmPassword = md5($_POST['confirmPassword']);
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Duplicate Email Check
    $emailCheck = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($emailCheck);

    // Check Duplicate Registration
    $regCheck = "SELECT * FROM students WHERE reg = '$reg'";
    $regResult = $conn->query($regCheck);

    if ($result->num_rows == 1) {
        $_SESSION['email_exits'] = 'Already Email Exist!';
        header('location: studentsAdd.php');
    } elseif ($password != $confirmPassword) {
        $_SESSION['password_wrong'] = "Password and Confirm Password Don't Match";
        header('location: studentsAdd.php');
    } elseif ($regResult->num_rows == 1) {
        $_SESSION['reg_exits'] = "Already Registration Exists!";
        header('location: studentsAdd.php');
    } else {
        // Profile Photo
        $target_dir = "../upload/";
        if (isset($_FILES['profilePhoto'])) {
            $file_upload = $target_dir . time() . "_" . basename($_FILES['profilePhoto']['name']);
            move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $file_upload);
        }

        // Users Table Data Insert
        $usersData = "INSERT INTO users( roles_id, name, email, password ) VALUES( '2', '$studentName', '$email', '$password' )";

        if ($conn->query($usersData) === TRUE) {
            $userId = $conn->insert_id;
        }

        // Students Table Data Insert
        $studentsData = "INSERT INTO students( userId, studentName, fatherName, motherName, semesterId, roll, reg, departmentId, age, gender, email, password, contact, address, profilePhoto ) VALUES( '$userId', '$studentName', '$fatherName', '$motherName', '$semesterId', '$roll', '$reg', '$departmentId', '$age', '$gender', '$email', '$password', '$contact', '$address', '$file_upload' )";

        if ($conn->query($studentsData) === TRUE) {
            $_SESSION['insert_data'] = "Data Inserted!";
            header('location: students.php');
        } else {
            $_SESSION['insert_error'] = "Data Insert Fail!";
            header('location: studentsAdd.php');
        }
    }
}


// Students Table Data Update
if (isset($_POST['update']) && !empty($_POST['studentName']) && !empty($_POST['fatherName']) && !empty($_POST['motherName'])) {
    $id = $_POST['id'];
    $studentName = $_POST['studentName'];
    $fatherName = $_POST['fatherName'];
    $motherName = $_POST['motherName'];
    $semester = $_POST['semester'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Delete Image
    $selectImg = "SELECT * FROM students WHERE id = '$id'";
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
    $updateSql = "UPDATE students SET studentName = '$studentName', fatherName = '$fatherName', motherName = '$motherName', semester = '$semester', age = '$age', gender = '$gender', contact = '$contact', address = '$address', profilePhoto = '$file_upload' WHERE id = '$id'";

    if ($conn->query($updateSql) === TRUE) {
        $_SESSION['update_data'] = "Updated Data! id = $id";
        header('location: students.php');
    } else {
        $_SESSION['update_error'] = "Update Error! id = $id";
        header('location: studentsUpdate');
    }
}