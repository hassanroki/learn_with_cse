<?php
    // Session Start
    session_start();
?>

<?php
    // Connect DB
    require('include/connect.php');
?>

<?php
    // // Gender Table Create Then Comment Out
    // $createTable = "CREATE TABLE gender( id INT(11) AUTO_INCREMENT PRIMARY KEY, name VARCHAR(80) )";
    // if( $conn -> query( $createTable ) === TRUE ) {
    //     echo "Table Created!";
    // } else {
    //     echo ("Table Create Error!") . $conn -> connect_error;
    // };


    // Gender Table Data Insert
    function addGender() {
        if( isset( $_POST['insert'] ) && !empty( $_POST['name'] ) ) {
            $name = $_POST['name'];

            $insertData = "INSERT INTO gender( name ) VALUES( '$name' )";

            global $conn;
            if( $conn -> query( $insertData ) === TRUE ) {
                $_SESSION['insert_data'] = "Inserted Data!";
                header('location: gender.php');
            } else {
                $_SESSION['insert_error'] = "Data Insert Failed!";
                header('location: genderAdd.php');
            }
        }
    };
    addGender();


    // Update Gender Table Data
    function updateGender() {
        if( isset( $_POST['update'] ) && !empty( $_POST['name'] ) ) {
            $id = $_POST['id'];
            $name = $_POST['name'];

            $updateData = "UPDATE gender SET name = '$name' WHERE id = '$id'";

            global $conn;
            if( $conn -> query( $updateData ) === TRUE ) {
                $_SESSION['update_data'] = "Updated Data! id = $id";
                header('location: gender.php');
            } else {
                $_SESSION['update_error'] = "Update Fail!";
                header('location: genderUpdate.php');
            }
        }
    };
    updateGender();


    // Delete Gender Table Data
    function deleteGender() {
        if( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ) {
            $id = $_GET['id'];

            $deleteData = "DELETE FROM gender WHERE id = '$id'";

            global $conn;
            if( $conn -> query( $deleteData ) === TRUE ) {
                $_SESSION['delete_data'] = "Deleted Data! id = $id";
                header('location: gender.php');
            } else {
                $_SESSION['delete_error'] = "Delete Fail! id = $id";
                header('location: gender.php');
            }
        }
    };
    deleteGender();
?>