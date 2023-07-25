<?php
// Session Start
session_start();
?>

<?php
// Url
$url = "http://localhost/learn_with_cse/admin/";
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// // Create Table Only Then Comment out
// $sqlTable = "CREATE TABLE class( id Int(11) AUTO_INCREMENT PRIMARY KEY, className varchar(55) )";

// if( $conn -> query( $sqlTable ) === TRUE ) {
//     echo "Table Create Success!";
// } else {
//     echo ("Table Create Failed!") . $conn -> error;
// }

// Insert Data to Table
if (isset($_POST['insert']) && !empty($_POST['className'])) {
    $className = $_POST['className'];

    $sqlInsert = "INSERT INTO class( className ) VALUES( '$className' )";

    if ($conn -> query($sqlInsert) === TRUE) {
        $_SESSION['insert_data'] = "Data Inserted!";
        header('location: class.php');
    } else {
        $_SESSION['insert_error'] = "Data Insert Failed!";
        header("location: classAdd.php");
    }
}

// Update Data
if( isset( $_POST['update'] ) && !empty( $_POST['className'] ) ) {
    $className = $_POST['className'];
    $id = $_POST['id'];

    $updateSql = "UPDATE class SET className = '$className' WHERE id = '$id'";

    if( $conn -> query( $updateSql ) ) {
        $_SESSION['update_data'] = "Update Data id = $id";
        header('location: class.php');
    } else {
        $_SESSION['update_error'] = "Update Fail id = $id";
        header('location: class.php');
    }
}

?>
