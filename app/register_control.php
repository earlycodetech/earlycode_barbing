<?php
    require "../assets/modules/dbConnect.php";
    // 1. Check if the button is clicked
    // var_dump($_POST);
    session_start();

    // SET DEFAULT TIMEZONE
    date_default_timezone_set('Africa/Lagos');


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
        $date = date('Y-m-d');

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
            // Hash the password
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO users(full_name, email, phone, dob, passwords, created_at) VALUE(?,?,?,?,?,?)";
            $stmt = mysqli_stmt_init($connectDB);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt,"ssssss", $fullName, $email, $phone, $dob,$hash, $date);

            $execute = mysqli_stmt_execute($stmt);

            if (!$execute) {
                $_SESSION['error_msg'] = "Oops, something went wrong!";
                header("Location: ../register");
            }else{
                $_SESSION['success_msg'] = "Account created successfully!";
                header("Location: ../login");
            }
        }
    }