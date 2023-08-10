<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// // Create Subjects Table Then Comment Out
// $createTable = "CREATE TABLE subjects( id INT(11) PRIMARY KEY AUTO_INCREMENT, courseCode VARCHAR(80), courseTitle VARCHAR(80), credit VARCHAR(11), mark INT(11), teacherId INT(11), semesterId INT(11) )";

// if( $conn -> query( $insetTable ) === TRUE ) {
//     echo "Table Created Success!";
// } else {
//     echo ("Table Create Fail!") . $conn -> connect_error;
// }


// Insert Data Subjects Table
function addSubjects()
{
    if (isset($_POST['insert']) && !empty($_POST['courseCode']) && !empty($_POST['courseTitle']) && !empty($_POST['credit'])) {
        $courseCode = $_POST['courseCode'];
        $courseTitle = $_POST['courseTitle'];
        $credit = $_POST['credit'];
        $mark = $_POST['mark'];
        $teacherId = $_POST['teacherId'];
        $semesterId = $_POST['semesterId'];
        global $conn;

        // Check Duplicate Course Code & Course Title
        $checkSubjects = "SELECT * FROM subjects WHERE courseCode = '$courseCode' OR courseTitle = '$courseTitle'";
        $result = $conn->query($checkSubjects);
        if ($result->num_rows == 1) {
            $_SESSION['course_exits'] = "Course Code & Course Title Already Exits!";
            header('location: subjectsAdd.php');
        } else {
            $insertData = "INSERT INTO subjects( courseCode, courseTitle, credit, mark, teacherId, semesterId ) VALUES( '$courseCode', '$courseTitle', '$credit', '$mark', '$teacherId', '$semesterId' )";

            if ($conn->query($insertData) === TRUE) {
                $_SESSION['insert_data'] = "Inserted Data!";
                header('location: subjects.php');
            } else {
                $_SESSION['insert_error'] = "Data Insert Fail!";
                header('location: subjectsAdd.php');
            }
        }
    }
}
addSubjects();


// Update Subjects Table
function updateSubjects()
{
    if (isset($_POST['update']) && !empty($_POST['courseCode']) && !empty($_POST['courseTitle']) && !empty($_POST['credit'])) {
        $id = $_POST['id'];
        $courseCode = $_POST['courseCode'];
        $courseTitle = $_POST['courseTitle'];
        $credit = $_POST['credit'];
        $mark = $_POST['mark'];
        $teacherId = $_POST['teacherId'];
        $semesterId = $_POST['semesterId'];
        global $conn;

        // Check Duplicate Course Code & Course Title
        $checkSubjects = "SELECT * FROM subjects WHERE courseCode = '$courseCode' OR courseTitle = '$courseTitle'";
        $result = $conn->query($checkSubjects);
        if ($result->num_rows == 1) {
            $_SESSION['course_exits'] = "Course Code & Course Title Already Exits!";
            header('location: subjects.php');
        } else {
            $updateData = "UPDATE subjects SET courseCode = '$courseCode', courseTitle = '$courseTitle', credit = '$credit', mark = '$mark', teacherId = '$teacherId', semesterId = '$semesterId' WHERE id = $id";

            if ($conn->query($updateData) === TRUE) {
                $_SESSION['update_data'] = "Updated Data! id = $id";
                header('location: subjects.php');
            } else {
                $_SESSION['update_error'] = "Update Fail!";
                header('location: subjectsUpdate.php');
            }
        }
    }
}
updateSubjects();


// Delete Data Subjects Table
// use delete query connect function file
require_once('include/function.php');

$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $deleteData = deleteAnyTableData('subjects', $id);

    if ($deleteData === TRUE) {
        $_SESSION['delete_data'] = "Data Deleted! id = $id";
        header('location: subjects.php');
    } else {
        $_SESSION['delete_error'] = "Delete Fail! id = $id";
        header('location: subjects.php');
    }
}
