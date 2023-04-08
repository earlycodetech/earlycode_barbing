<?php
    // 1. Check if the button is clicked
    // var_dump($_POST);
    session_start();


    if (!isset($_POST['register'])) {
        $_SESSION['error_msg'] = "You are not authorized to view this page";
        header("Location: ../register");
    }
    else{
        // 2. Collect Data
        $fullName = trim($_POST['name']);
        $email = trim($_POST['email']);
        $phone = trim($_POST['phone']);
        $dob = trim($_POST['dob']);
        $password = trim($_POST['password']);
        $password_confirm = trim($_POST['password_confirm']);


        // 3. Build Constraints
        if ($fullName === "" || $email === "" || $phone === "" || $dob === "" || $password === "" || $password_confirm === "" ) {
            $_SESSION['error_msg'] = "Fields cannot be empty!";
            header("Location: ../register");
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error_msg'] = "Invalid Email!";
            header("Location: ../register");
        }
        elseif (strlen($password) < 8) {
            $_SESSION['error_msg'] = "Passwords must be at least 8 characters!";
            header("Location: ../register");
        }  
        elseif ($password != $password_confirm) {
            $_SESSION['error_msg'] = "Passwords do not match!";
            header("Location: ../register");
        }  
        else {
            $_SESSION['success_msg'] = "Account has been created!";
            header("Location: ../register");
        }
    }