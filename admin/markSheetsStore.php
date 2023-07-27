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
// $createTable = "CREATE TABLE markSheets( id INT(11) AUTO_INCREMENT PRIMARY KEY, studentId INT(11), semesterId INT(11), subjectId INT(11), mark INT(11) )";

// if( $conn -> query( $createTable ) === TRUE ) {
//     echo "Created Table!";
// } else {
//     echo ("Table create fail!") . $conn -> connect_error;
// }


// Insert Data markSheets Table
function addMarkSheets()
{
    if (isset($_POST['insert']) && !empty($_POST['studentId']) && !empty($_POST['semesterId']) && !empty($_POST['subjectId']) && !empty($_POST['mark'])) {
        $studentId = $_POST['studentId'];
        $semesterId = $_POST['semesterId'];
        $subjectId = $_POST['subjectId'];
        $mark = $_POST['mark'];
        global $conn;

        // Check Duplicate Subjects
        $subCheck = "SELECT * FROM markSheets WHERE subjectId = '$subjectId' and $studentId = '$studentId'";
        $subResult = $conn->query($subCheck);

        if ($subResult->num_rows == 1 ) {
            $_SESSION['subject_exits'] = "Already Exits Subjects!";
            header('location: markSheetsAdd.php');
        } else {
            $insertData = "INSERT INTO markSheets( studentId, semesterId, subjectId, mark ) VALUES( '$studentId', '$semesterId', '$subjectId', '$mark' )";

            if ($conn->query($insertData) === TRUE) {
                $_SESSION['insert_data'] = "Data Inserted!";
                header('location: markSheets.php');
            } else {
                $_SESSION['insert_error'] = "Data Insert Fail!";
                header('location: markSheetsAdd.php');
            }
        }
    }
}
addMarkSheets();


function updateMarkSheets() {
    if( isset( $_POST['update'] ) && !empty( $_POST['studentId'] ) && !empty( $_POST['semesterId'] ) && !empty( $_POST['subjectId'] ) && !empty( $_POST['mark'] ) ) {
        $id = $_POST['id'];
        $studentId = $_POST['studentId'];
        $semesterId = $_POST['semesterId'];
        $subjectId = $_POST['subjectId'];
        $mark = $_POST['mark'];

        $updateData = "UPDATE markSheets SET studentId = '$studentId', semesterId = '$semesterId', subjectId = '$subjectId', mark = '$mark' WHERE id = '$id'";

        global $conn;
        if( $conn -> query( $updateData ) === TRUE ) {
            $_SESSION['update_data'] = "Data Updated! id = $id";
            header('location: markSheets.php');
        } else {
            $_SESSION['update_error'] = "Data Update Fail!";
            header('location: markSheetsUpdate.php');
        }
    }
}
updateMarkSheets();


// Delete MarkSheets Table Data
// Used Query Function
require_once('include/function.php');
$data = [];
if( isset( $_GET['id'] ) && !empty( $_GET['id'] ) ) {
    $id = $_GET['id'];

    $deleteData = deleteAnyTableData('markSheets', $id);
    
    if( $deleteData === TRUE ) {
        $_SESSION['delete_data'] = "Deleted Data! id = $id";
        header('location: markSheets.php');
    } else {
        $_SESSION['delete_error'] = "Data Delete Fail! id = $id";
        header('location: markSheets.php');
    }

}