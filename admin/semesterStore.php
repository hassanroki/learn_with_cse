<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// // Create Table Only Then Comment out
// $sqlTable = "CREATE TABLE semester( id Int(11) AUTO_INCREMENT PRIMARY KEY, semester varchar(55) )";

// if( $conn -> query( $sqlTable ) === TRUE ) {
//     echo "Table Create Success!";
// } else {
//     echo ("Table Create Failed!") . $conn -> error;
// }

// Insert Data to Semester Table
function addSemester()
{
    if (isset($_POST['insert']) && !empty($_POST['semester'])) {
        $semester = $_POST['semester'];

        $sqlInsert = "INSERT INTO semester( semester ) VALUES( '$semester' )";

        global $conn;
        if ($conn->query($sqlInsert) === TRUE) {
            $_SESSION['insert_data'] = "Data Inserted!";
            header('location: semester.php');
        } else {
            $_SESSION['insert_error'] = "Data Insert Failed!";
            header("location: semesterAdd.php");
        }
    }
}
addSemester();


// Update Data Semester Table
function updateSemester(){
    if (isset($_POST['update']) && !empty($_POST['semester'])) {
        $semester = $_POST['semester'];
        $id = $_POST['id'];
    
        $updateSql = "UPDATE semester SET semester = '$semester' WHERE id = '$id'";
    
        global $conn;
        if ($conn->query($updateSql)) {
            $_SESSION['update_data'] = "Update Data! id = $id";
            header('location: semester.php');
        } else {
            $_SESSION['update_error'] = "Update Fail!";
            header('location: semesterUpdate.php');
        }
    }
}
updateSemester();


// Delete Data
// Function Delete Query
require_once('include/function.php');

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $deleteSql = deleteAnyTableData('semester', $id);

    if ($deleteSql == TRUE) {
        $_SESSION['delete_data'] = "Data Deleted! id = $id";
        header('location: semester.php');
    } else {
        $_SESSION['delete_error'] = "Delete Fail! id = $id";
        header('location: semester.php');
    }
}