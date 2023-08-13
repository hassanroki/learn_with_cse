<?php
// Session Start
//session_start();

// Connect DB
require('include/connect.php');
$semesterId = $_POST['semesterId'];
$studentReg = $_POST['studentReg'];
$checkSql = "SELECT * FROM students WHERE semesterId = '$semesterId' and reg = '$studentReg'";
$checkResult = $conn -> query( $checkSql );

if( $checkResult -> num_rows !== 1 ) {
    $_SESSION['reg_exits'] = "Semester Or Registration Invalid!";
    header('location: result.php');
} else {
    header('location: resultSheets.php');
}