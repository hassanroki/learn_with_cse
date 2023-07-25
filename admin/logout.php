<?php
    // Session Start
    session_start();
if( isset( $_SESSION['login_success'] ) ) {
     //session_destroy();
    unset( $_SESSION['login_success'] );
    header('location: login.php');
}
