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

// Website View Any Table Data & Any Column
function selectAnyTableWhereColumnId($table, $where, $id)
{
    global $conn;
    $showData = "SELECT * FROM $table WHERE $where = $id";
    return $conn->query($showData);
}


// Delete Any Table Data
function deleteAnyTableData($table, $id)
{
    global $conn;
    $deleteData = "DELETE FROM $table WHERE id = $id";
    return $conn -> query( $deleteData );
}
