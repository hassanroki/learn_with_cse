<?php
// Connect DB
require('connect.php');
$semesterId = $_POST['semesterId'];

// Select Semester table
$showData = "SELECT * FROM subjects WHERE semesterId = $semesterId";
$query = $conn->query($showData);

$subjectList = "<option value=''>Select Subject</option>";
while ($data = $query->fetch_object()) {
    $subjectList .= "<option value='" . $data->id . "'>" . $data->courseTitle . "</option>";
}
echo $subjectList;
