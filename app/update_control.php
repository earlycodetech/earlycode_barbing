<?php
    require "../assets/modules/dbConnect.php";
    // 1. Check if the button is clicked
    // var_dump($_POST);
    session_start();

    // SET DEFAULT TIMEZONE
    date_default_timezone_set('Africa/Lagos');


    if (!isset($_POST['update'])) {
        $_SESSION['error_msg'] = "You are not authorized to view this page";
        header("Location: logout");
    }
    else{
        // 2. Collect Data
        $fullName = trim($_POST['full_name']);
        $phone = trim($_POST['phone']);
        $dob = trim($_POST['dob']);
       

        // 3. Build Constraints
        if ($fullName === ""  || $phone === "" || $dob === "" ) {
            $_SESSION['error_msg'] = "Fields cannot be empty!";
            header("Location: ../users/profile");
        } 
        else {
            $id = $_SESSION['user'];

            $sql = "UPDATE users SET full_name = ?, phone = ?, dob = ? WHERE id = ?";
            $stmt = mysqli_stmt_init($connectDB);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt,"ssss", $fullName, $phone, $dob,$id);

            $execute = mysqli_stmt_execute($stmt);

            if (!$execute) {
                $_SESSION['error_msg'] = "Oops, something went wrong!";
                header("Location: ../users/profile");
            }else{
                $_SESSION['success_msg'] = "Account updated successfully!";
                header("Location: ../users/profile");
            }
        }
    }