<?php
// Connect DB
require('connect.php');
?>

<?php

// Any Table Data Showing Use This Function
function showDataAnyTable($table)
{
    global $conn;
    $showData = "SELECT * FROM $table";
    return $conn->query($showData);
}


// Website View Any Table Data
function selectAnyTableWhereId($table, $id)
{
    global $conn;
    $showData = "SELECT * FROM $table WHERE id = $id";
    return $conn->query($showData);
}

// Delete Any Table Data
function deleteAnyTableData($table, $id)
{
    global $conn;
    $deleteData = "DELETE FROM $table WHERE id = $id";
    return $conn->query($deleteData);
}

// Website View Any Table Data & Any Column
function selectAnyTableWhereColumnId($table, $where, $id)
{
    global $conn;
    $showData = "SELECT * FROM $table WHERE $where = $id";
    return $conn->query($showData);
}

// Select Any Where Query
function selectAnyWhereQuery($table, $where)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE $where LIMIT 1";
    $data = $conn->query($sql);
    return $data->fetch_object();
}

// Select Any Where Query All
function selectAnyWhereQueryAll($table, $where)
{
    global $conn;
    $sql = "SELECT * FROM $table WHERE $where";
    return $conn->query($sql);
}


// Calculate Letter Grade
function getLetterGrade($mark)
{
    $gpa = "";

    if ($mark >= 80 && $mark <= 100) {
        $gpa = "A+";
    } elseif ($mark >= 70 && $mark <= 79) {
        $gpa = "A";
    } elseif ($mark >= 60 && $mark <= 69) {
        $gpa = "A-";
    } elseif ($mark >= 50 && $mark <= 59) {
        $gpa = "B";
    } elseif ($mark >= 40 && $mark <= 49) {
        $gpa = "C";
    } elseif ($mark >= 33 && $mark <= 39) {
        $gpa = "D";
    } elseif ($mark <= 32 && $mark >= 0) {
        $gpa = "F";
    } else {
        $gpa = "Invalid Mark!";
    }
    return $gpa;
}


// Calculate Grade Point
function getGradePoint($mark)
{
    $gpa = "";

    if ($mark >= 80 && $mark <= 100) {
        $gpa = 5.0;
    } elseif ($mark >= 70 && $mark <= 79) {
        $gpa = 4.0;
    } elseif ($mark >= 60 && $mark <= 69) {
        $gpa = 3.5;
    } elseif ($mark >= 50 && $mark <= 59) {
        $gpa = 3.0;
    } elseif ($mark >= 40 && $mark <= 49) {
        $gpa = 2.5;
    } elseif ($mark >= 33 && $mark <= 39) {
        $gpa = 2.0;
    } elseif ($mark <= 32 && $mark >= 0) {
        $gpa = 0.0;
    } else {
        $gpa = "Invalid Mark!";
    }
    return $gpa;
}


// CGpa
function getCGpa($grade)
{
    $cGpa = "";

    if ($grade == 5) {
        $cGpa = "A+";
    } elseif ($grade >= 4 && $grade <= 4.99) {
        $cGpa = "A";
    } elseif ($grade >= 3.50 && $grade <= 3.99) {
        $cGpa = "A-";
    } elseif ($grade >= 3 && $grade <= 3.49) {
        $cGpa = "B";
    } elseif ($grade >= 2 && $grade <= 2.99) {
        $cGpa = "C";
    } elseif ($grade >= 1 && $grade <= 1.99) {
        $cGpa = "D";
    } else {
        $cGpa = "Invalid Grade!";
    }

    return $cGpa;
}

// Current Age Calculate
function getAge( $dob ) {
    $bday = new DateTime( $dob );
    $today = new DateTime( date('m.d.y') );

    if( $bday>$today ) {
        return 'You are not born yet';
    } else {
        $diff = $today->diff($bday);
        return $diff->y . ' Years ' . $diff->m . ' Months ' . $diff->d . ' Days';
    }
}
