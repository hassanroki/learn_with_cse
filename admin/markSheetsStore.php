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
    // $createTable = "CREATE TABLE markSheets( id INT(11) AUTO_INCREMENT PRIMARY KEY, classId VARCHAR(80), studentId VARCHAR(80), studentReg VARCHAR(80), subjectId VARCHAR(80), mark INT(11) )";

    // if( $conn -> query( $createTable ) === TRUE ) {
    //     echo "Created Table!";
    // } else {
    //     echo ("Table create fail!") . $conn -> connect_error;
    // }