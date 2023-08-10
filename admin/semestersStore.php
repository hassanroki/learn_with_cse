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
// $sqlTable = "CREATE TABLE semesters( id Int(11) AUTO_INCREMENT PRIMARY KEY, name varchar(55) )";

// if( $conn -> query( $sqlTable ) === TRUE ) {
//     echo "Table Create Success!";
// } else {
//     echo ("Table Create Failed!") . $conn -> error;
// }

// Insert Data to Semesters Table
function addSemesters()
{
    if (isset($_POST['insert']) && !empty($_POST['name'])) {
        $name = $_POST['name'];

        global $conn;
        $checkDuplicateSemester = "SELECT * FROM semesters WHERE name = '$name'";
        $result = $conn->query($checkDuplicateSemester);

        if ($result->num_rows == 1) {
            $_SESSION['name_exits'] = "Semester Already Exits!";
            header('location: semestersAdd.php');
        } else {

            $sqlInsert = "INSERT INTO semesters( name ) VALUES( '$name' )";
            if ($conn->query($sqlInsert) === TRUE) {
                $_SESSION['insert_data'] = "Data Inserted!";
                header('location: semesters.php');
            } else {
                $_SESSION['insert_error'] = "Data Insert Failed!";
                header("location: semestersAdd.php");
            }
        }
    }
}
addSemesters();


// Update Data Semesters Table
function updateSemesters()
{
    if (isset($_POST['update']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
        $id = $_POST['id'];
        global $conn;

        $selectSql = "SELECT * FROM semesters WHERE name = '$name'";
        $checkSemester = $conn->query($selectSql);

        if ($checkSemester->num_rows == 1) {
            $_SESSION['name_exits'] = "Can't used this name! Already Used";
            header('location: semesters.php');
        } else {

            $updateSql = "UPDATE semesters SET name = '$name' WHERE id = '$id'";

            if ($conn->query($updateSql)) {
                $_SESSION['update_data'] = "Update Data! id = $id";
                header('location: semesters.php');
            } else {
                $_SESSION['update_error'] = "Update Fail!";
                header('location: semestersUpdate.php');
            }
        }
    }
}
updateSemesters();


// Delete Data
// Function Delete Query
require_once('include/function.php');

function deleteSemesterData()
{
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        $deleteSql = deleteAnyTableData('semesters', $id);

        if ($deleteSql == TRUE) {
            $_SESSION['delete_data'] = "Data Deleted! id = $id";
            header('location: semesters.php');
        } else {
            $_SESSION['delete_error'] = "Delete Fail! id = $id";
            header('location: semesters.php');
        }
    }
}
deleteSemesterData();
