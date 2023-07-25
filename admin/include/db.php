<?php
    // Create One then Comment Out
    $serverName = "localhost";
    $userName = "root";
    $pass = "";

    // Create Connection
    $conn = new mysqli( $serverName, $userName, $pass );

    if( $conn -> connect_error ) {
        die("Connected Failed!") . $conn -> connect_error;
    } 
    // else {
    //     echo "Connected!";
    // }

    // Create Database
    $sql = "CREATE DATABASE learn_with_cse";
    if( $conn -> query( $sql ) === TRUE ) {
        echo "Database Created!";
    } else {
        echo ("Database Create Failed!") . $conn -> error;
    }

    $conn -> close();
?>