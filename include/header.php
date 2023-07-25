<?php
// create url
$url = "http://localhost/learn_with_cse/";
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
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Academics</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $url; ?>teachers.php" class="dropdown-item">Teachers</a></li>
                            <li><a href="<?php echo $url; ?>students.php" class="dropdown-item">Students</a></li>
                            <li><a href="<?php echo $url; ?>courses.php" class="dropdown-item">Courses</a></li>
                            <li><a href="<?php echo $url; ?>admission_fees.php" class="dropdown-item">Admission Fees</a></li>
                            <li><a href="<?php echo $url; ?>online_admission.php" class="dropdown-item">Online Admission</a></li>
                            <li><a href="<?php echo $url; ?>activities.php" class="dropdown-item">Activities</a></li>
                            <li><a href="<?php echo $url; ?>britishCouncil.php" class="dropdown-item">British Council</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Portal</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $url; ?>studentPortal.php" class="dropdown-item">Students Portal</a></li>
                            <li><a href="<?php echo $url; ?>teacherPortal.php" class="dropdown-item">Teacher Portal</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $url; ?>gallery.php" class="nav-link">Gallery</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $url; ?>notice.php" class="nav-link">Notice</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $url; ?>contact.php" class="nav-link">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sign In</a>
                        <ul class="dropdown-menu">
                            <li><a href="<?php echo $url; ?>login.php" class="dropdown-item">Login</a></li>
                            <li><a href="<?php echo $url; ?>logout.php" class="dropdown-item">Logout</a></li>
                            <li><a href="<?php echo $url; ?>registration.php" class="dropdown-item">Registration</a></li>
                        </ul>
                    </li>
                </ul>
                <form action="" class="d-flex">
                    <input type="search" class="form-control me-2" placeholder="Search">
                    <button type="button" class="btn btn-light btn-outline-secondary">Submit</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- Header Section End -->

