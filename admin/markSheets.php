<?php
    // Session Start
    session_start();
?>

<?php
    // Connect DB
    require('include/connect.php');
?>

<?php
    // Header
    include_once('include/header.php');
?>

<?php
    // Call Function
    require_once('include/function.php');
?>

<!-- Html -->
<div class="col-md-9 ps-3">
    <a href="markSheetsAdd.php" class="btn btn-info">Add MarkSheets</a>
    <h2 class="text-center">All MarkSheets</h2>
    <hr>
    <table class="table table-bordered box-shadow">
        <thead>
            <tr>
                <th>SL</th>
                <th>Class Id</th>
                <th>Student Id</th>
                <th>Student Roll</th>
                <th>Student Registration</th>
                <th>Subject Id</th>
                <th>Mark</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>01</td>
                <td>03</td>
                <td>0009</td>
                <td>00066</td>
                <td>101</td>
                <td>60</td>
                <td>60</td>
                <td>
                    <a href="" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-warning" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php
    // Footer
    include_once('include/footer.php');
?>

<?php

// Session Unset
unset($_SESSION['']);