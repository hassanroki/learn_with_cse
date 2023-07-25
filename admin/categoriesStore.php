<?php
// Session Start
session_start();
?>

<?php
// Connect DB
require('include/connect.php');
?>

<?php
// // Create Categories Table then comment out
// $createTable = "CREATE TABLE categories( id INT(11) PRIMARY KEY AUTO_INCREMENT, name VARCHAR(80) )";

// if( $conn -> query( $createTable ) === TRUE ) {
//     echo "Table Created!";
// } else {
//     echo ("Table Create Failed!") . $conn -> connect_error;
// }


// Categories Table Data Insert
function addCategories()
{
    if (isset($_POST['insert']) && !empty($_POST['name'])) {
        $name = $_POST['name'];

        $insertData = "INSERT INTO categories( name ) VALUES( '$name' )";

        global $conn;
        if ($conn->query($insertData) === TRUE) {
            $_SESSION['insert_data'] = "Data Inserted!";
            header('location: categories.php');
        } else {
            $_SESSION['insert_error'] = "Insert Data Failed!";
            header('location: categoriesAdd.php');
        }
    }
}
addCategories();

// Update Categories Table
function updateCategories()
{
    if (isset($_POST['update']) && !empty($_POST['name'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];

        $updateData = "UPDATE categories SET name = '$name' WHERE id = $id";

        global $conn;
        if ($conn->query($updateData) === TRUE) {
            $_SESSION['update_data'] = "Updated Data! id = $id";
            header('location: categories.php');
        } else {
            $_SESSION['update_error'] = "Update Failed!";
            header('location: categoriesUpdate.php');
        }
    }
}
updateCategories();


// Connect Function Use Delete Query
include_once('include/function.php');
// Delete Categories Table Data
$data = [];
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];
    $deleteTableData = deleteAnyTableData( 'categories', $id );

    if ( $deleteTableData === TRUE) {
        $_SESSION['delete_data'] = "Deleted Data! id = $id";
        header('location: categories.php');
    } else {
        $_SESSION['delete_error'] = "Delete Failed! id = $id";
        header('location: categories.php');
    }
}
