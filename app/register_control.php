<?php
    // 1. Check if the button is clicked
    // var_dump($_POST);
    session_start();


    if (!isset($_POST['register'])) {
        $_SESSION['error_msg'] = "You are not authorized to view this page";
        header("Location: ../register");
    }
    else{
        $_SESSION['success_msg'] = "Account Created Successfully";
        header("Location: ../register");
    }