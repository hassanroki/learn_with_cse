<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// // Create Departments Table Then Comment Out
// $createTable = "CREATE TABLE departments( id INT(11) PRIMARY KEY AUTO_INCREMENT, name VARCHAR(255) )";

// if( $conn -> query( $createTable ) === TRUE ) {
//     echo "Table Create Successfully!";
// } else {
//     echo ("Table Create Error!") . $conn -> connect_error;
// }

// Data Insert to Departments Table
function addDepartments()
{
    if (isset($_POST['insert']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
        global $conn;

        // Check Duplicate Department
        $checkDepartments = "SELECT * FROM departments WHERE name = '$name'";
        $result = $conn->query($checkDepartments);

        if ($result->num_rows == 1) {
            $_SESSION['name_exits'] = "Departments Already Exits!";
            header('location: departmentsAdd.php');
        } else {
            $insertData = "INSERT INTO departments( name ) VALUES( '$name' )";

            if ($conn->query($insertData) === TRUE) {
                $_SESSION['data_insert'] = "Data Insert Success!";
                header('location: departments.php');
            } else {
                $_SESSION['data_error'] = "Data Insert Failed!";
                header('location: departmentsAdd.php');
            }
        }
    }
}
addDepartments();


// Departments Table Update
function updateDepartmentsData()
{
    if (isset($_POST['update']) && !empty($_POST['name'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        global $conn;

        // Check Duplicate Departments
        $checkDepartments = "SELECT * FROM departments WHERE name = '$name'";
        $result = $conn->query($checkDepartments);

        if ($result->num_rows == 1) {
            $_SESSION['name_exits'] = "Departments Already Exits! Used Another Department Name";
            header('location: departments.php');
        } else {
            $updateData = "UPDATE departments SET name = '$name' WHERE id = '$id'";

            if ($conn->query($updateData) === TRUE) {
                $_SESSION['update_data'] = "Update Data! id = $id";
                header('location: departments.php');
            } else {
                $_SESSION['update_error'] = "Update Failed! id = $id";
                header('location: departments.php');
            }
        }
    }
}
updateDepartmentsData();



// Delete Departments Table Data
// Query Function
require_once('include/function.php');

function deleteDepartmentsData(){
    $data = [];
    if( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ) {
        $id = $_GET['id'];

        $deleteData = deleteAnyTableData('departments', $id);

        if( $deleteData === TRUE ) {
            $_SESSION['delete_data'] = "Deleted Data! id = $id";
            header('location: departments.php');
        } else {
            $_SESSION['delete_error'] = "Delete Fail! id = $id";
            header('location: departments.php');
        }
    }
}
deleteDepartmentsData();
