<?php
// Url
$url = "http://localhost/learn_with_cse/admin/";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn With CSE</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>asset/css/bootstrap.min.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $url; ?>asset/css/all.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo $url; ?>asset/css/style.css?v=<?php echo time(); ?>">

    <!-- Responsive css -->
    <link rel="stylesheet" href="<?php echo $url; ?>asset/css/responsive.css?v=<?php echo time(); ?>">
</head>

<body>
    <!-- Header Section Start -->
    <nav class="navbar navbar-expand-lg menubar flex-wrap sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand text-white text-uppercase logo" href="<?php echo $url; ?>index.php"><span>Learn With</span> CSE</a>
            <button class="navbar-toggler bg-primary" type="button" data-bs-toggle="collapse" data-bs-target="#navbarID" aria-controls="navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarID">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a href="<?php echo $url; ?>index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $url; ?>#aboutUs" class="nav-link">About</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sign In</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $url; ?>login.php" class="dropdown-item">Login</a></li>
                            <li><a href="<?php echo $url; ?>logout.php" class="dropdown-item">Logout</a></li>
                            <li><a href="<?php echo $url; ?>adminAdd.php" class="dropdown-item">Registration</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Header Section End -->

    <!-- Left Menu Start -->
    <div class="left-menu">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-3 pe-3">
                    <ul class="navbar-nav list-group">
                        <li class="list-group-item active">Left Menu</li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>students.php" class="btn">Students</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>semesters.php" class="btn">Semesters</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>subjects.php" class="btn">Subjects</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>departments.php" class="btn">Departments</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>teachers.php" class="btn">Teachers</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>genders.php" class="btn">Genders</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>courses.php" class="btn">Courses</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>categories.php" class="btn">Categories</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>markEntry.php" class="btn">Mark Entry</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>markSheets.php" class="btn">MarkSheets</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>markSheets.php" class="btn">MarkSheets</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>admin.php" class="btn">Admin</a>
                        </li>
                        <li class="list-group-item">
                            <a href="<?php echo $url; ?>users.php" class="btn">Users</a>
                        </li>
                    </ul>
                </div>