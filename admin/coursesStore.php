<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// // Courses Table Create Then Comment Out
// $createCoursesTable = "CREATE TABLE courses( id INT(11) PRIMARY KEY AUTO_INCREMENT, categoryId INT(11), name VARCHAR(80), profilePhoto VARCHAR(255), description TEXT(255) )";

// if( $conn -> query( $createCoursesTable ) === TRUE ) {
//     echo "Created Table!";
// } else {
//     echo ("Table Create Failed!") . $conn -> connect_error;
// }


function addCourse()
{
    // Insert Data to Course Table
    if (isset($_POST['insert']) && !empty($_POST['categoryId']) && !empty($_POST['name'])) {
        $categoryId = $_POST['categoryId'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        // Image Upload
        $target_dir = "../upload/";
        if ($_FILES['profilePhoto']) {
            $fileUpload = $target_dir . time() . "_" . basename($_FILES['profilePhoto']['name']);
            move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $fileUpload);
        }

        $insertData = "INSERT INTO courses( categoryId, name, profilePhoto, description ) VALUES( '$categoryId', '$name', '$fileUpload', '$description' )";

        global $conn;
        if ($conn->query($insertData) === TRUE) {
            $_SESSION['data_insert'] = "Data Inserted!";
            header('location: courses.php');
        } else {
            $_SESSION['data_error'] = "Data Inset Failed!";
            header('location: coursesAdd.php');
        }
    }
}
addCourse();


// Course Data Update
function updateCourses()
{
    if (isset($_POST['update']) && !empty($_POST['name']) && !empty($_POST['categoryId'])) {
        $id = $_POST['id'];
        $categoryId = $_POST['categoryId'];
        $name = $_POST['name'];
        $description = $_POST['description'];

        global $conn;
        // image delete
        $imgUpdate = "SELECT * FROM courses WHERE id ='$id'";
        $imgResult = $conn->query($imgUpdate);
        $imgShow = $imgResult->fetch_object();
        $imgLocation = $imgShow->profilePhoto;

        if (file_exists($imgLocation)) {
            unlink($imgLocation);
        }

        // Upload Image
        $target_dir = "../upload/";
        if (isset($_FILES['profilePhoto'])) {
            $fileUpload = $target_dir . time() . "_" . basename($_FILES['profilePhoto']['name']);
            move_uploaded_file($_FILES['profilePhoto']['tmp_name'], $fileUpload);
        }

        // Update Data
        $updateData = "UPDATE courses SET categoryId = '$categoryId', name = '$name', profilePhoto = '$fileUpload', description = '$description' WHERE id = '$id'";


        if ($conn->query($updateData) === TRUE) {
            $_SESSION['update_data'] = "Updated Data! id = $id";
            header('location: courses.php');
        } else {
            $_SESSION['update_error'] = "Update Failed! id = $id";
            header('location: courses.php');
        }
    }
}
updateCourses();


// Delete Course Table Data
// Delete Query Use Function File
require_once('include/function.php');

$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    $result = deleteAnyTableData('courses', $id);

    if ($result->num_rows == 1) {
        $_SESSION['delete_data'] = "Deleted Data! id = $id";
        header('location: courses.php');
    } else {
        $_SESSION['delete_error'] = "Delete Failed! id = $id";
        header('location: courses.php');
    }
}
