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
    function addGenders() {
        if( isset( $_POST['insert'] ) && !empty( $_POST['name'] ) ) {
            $name = $_POST['name'];
            global $conn;

            // Check Duplicate Gender
            $checkGender = "SELECT * FROM genders WHERE name = '$name'";
            $result = $conn -> query( $checkGender );
            if( $result -> num_rows == 1 ) {
                $_SESSION['name_exits'] = "Gender Already Exits!";
                header('location: gendersAdd.php');
            } else {
                $insertData = "INSERT INTO genders( name ) VALUES( '$name' )";

                if( $conn -> query( $insertData ) === TRUE ) {
                    $_SESSION['insert_data'] = "Inserted Data!";
                    header('location: genders.php');
                } else {
                    $_SESSION['insert_error'] = "Data Insert Failed!";
                    header('location: gendersAdd.php');
                }
            }
        }
    };
    addGenders();


    // Update Gender Table Data
    function updateGenders() {
        if( isset( $_POST['update'] ) && !empty( $_POST['name'] ) ) {
            $id = $_POST['id'];
            $name = $_POST['name'];
            global $conn;

            // Check Duplicate Gender
            $checkGender = "SELECT * FROM genders WHERE name = '$name'";
            $result = $conn -> query( $checkGender );
            if( $result -> num_rows == 1 ) {
                $_SESSION['name_exits'] = "Gender Already Exits!";
                header('location: genders.php');
            } else {
                $updateData = "UPDATE genders SET name = '$name' WHERE id = '$id'";

                if( $conn -> query( $updateData ) === TRUE ) {
                    $_SESSION['update_data'] = "Updated Data! id = $id";
                    header('location: genders.php');
                } else {
                    $_SESSION['update_error'] = "Update Fail!";
                    header('location: gendersUpdate.php');
                }
            }

        }
    };
    updateGenders();


    // Delete Gender Table Data
    function deleteGenders() {
        if( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ) {
            $id = $_GET['id'];

            $deleteData = "DELETE FROM genders WHERE id = '$id'";

            global $conn;
            if( $conn -> query( $deleteData ) === TRUE ) {
                $_SESSION['delete_data'] = "Deleted Data! id = $id";
                header('location: genders.php');
            } else {
                $_SESSION['delete_error'] = "Delete Fail! id = $id";
                header('location: genders.php');
            }
        }
    };
    deleteGenders();
