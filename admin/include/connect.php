<?php
    // Create Connection
    $serverName = "localhost";
    $userName = "root";
    $pass = "";
    $db = "learn_with_cse";

    $conn = new mysqli($serverName, $userName, $pass, $db);

    if ($conn->connect_error) {
        die("Database Connect Failed!") . $conn->connect_error;
    } else {
        //echo "Database Connected!";
    }
?>