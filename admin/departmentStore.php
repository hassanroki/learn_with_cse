<?php
    // Session Start
    session_start();
?>

<?php
    // Connect DB
    require('include/connect.php');
?>

<?php
    // // Create Department Table Then Comment Out
    // $createTable = "CREATE TABLE department( id INT(11) PRIMARY KEY AUTO_INCREMENT, departmentName VARCHAR(255) )";

    // if( $conn -> query( $createTable ) === TRUE ) {
    //     echo "Table Create Successfully!";
    // } else {
    //     echo ("Table Create Error!") . $conn -> connect_error;
    // }

    // Data Insert to Department Table
    if( isset( $_POST['insert'] ) && !empty( $_POST['departmentName'] ) ) {
        $departmentName = $_POST['departmentName'];

        $insertData = "INSERT INTO department( departmentName ) VALUES( '$departmentName' )";

        if( $conn -> query( $insertData ) === TRUE ) {
            $_SESSION['data_insert'] = "Data Insert Success!";
            header('location: department.php');
        } else {
            $_SESSION['data_error'] = "Data Insert Failed!";
            header('location: departmentAdd.php');
        }
    }


    // Department Table Update
    if( isset( $_POST['update'] ) && !empty( $_POST['departmentName'] ) ) {
        $id = $_POST['id'];
        $departmentName = $_POST['departmentName'];

        $updateData = "UPDATE department SET departmentName = '$departmentName' WHERE id = '$id'";

        if( $conn -> query( $updateData ) === TRUE ) {
            $_SESSION['update_data'] = "Update Data! id = $id";
            header('location: department.php');
        } else {
            $_SESSION['update_error'] = "Update Failed! id = $id";
            header('location: department.php');
        }
    }
?>