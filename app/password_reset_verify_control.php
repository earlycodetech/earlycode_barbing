<?php
require "../assets/modules/dbConnect.php";
// 1. Check if the button is clicked
// var_dump($_POST);
session_start();



if (!isset($_POST['reset-password'])) {
    $_SESSION['error_msg'] = "You are not authorized to view this page";
    header("Location: ../reset-password");
} else {
    $token = trim($_POST['token']);
    $newPassword = trim($_POST['password']);

    if ($token === "" || $newPassword === "") {
        $_SESSION['error_msg'] = "Fields cannot be empty!";
        header("Location: ../verify");
    } else {
        $sql = "SELECT * FROM users WHERE reset_token = ?";
        $stmt = mysqli_stmt_init($connectDB);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt, "s",  $token);

        $execute = mysqli_stmt_execute($stmt);

        if (!$execute) {
            $_SESSION['error_msg'] = "Oops, something went wrong!";
            header("Location: ../verify");
        } else {

            $result = mysqli_stmt_get_result($stmt);
            
            $numRows = mysqli_num_rows($result);

            if ($numRows < 1) {
                $_SESSION['error_msg'] = "Invalid Token!";
                header("Location: ../reset-password");
            } 
            elseif (strlen($newPassword) < 8) {
                $_SESSION['error_msg'] = "Password is too short!";
                header("Location: ../reset-password");
            }
            else {
                $row = mysqli_fetch_assoc($result);
                $id = $row['id'];
                $timestamp =  time() - intval($row['reset_timestamp']);
                // Checking if token is expired
                if ($timestamp >= 1800) { // 1800 seconds  is 30 minutes 
                    $token = null;
                    $timestamp = null;
                    $sql = "UPDATE users SET reset_token = ?, reset_timestamp = ? WHERE id = ?";
                    $stmt = mysqli_stmt_init($connectDB);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_bind_param($stmt,"sss", $token, $timestamp, $id);
                    
                    $execute = mysqli_stmt_execute($stmt);
        
                    if (!$execute) {
                        $_SESSION['error_msg'] = "Oops, something went wrong!";
                        header("Location: ../verify");
                    }else{
                        $_SESSION['error_msg'] = "Token has expired, please try again!";
                        header("Location: ../reset-password");
                    }
                }

                // If token is not expired
                else{
                    // Hash the password
                    $password = password_hash($newPassword, PASSWORD_DEFAULT);
                    $token = null;
                    $timestamp = null;

                    $sql = "UPDATE users SET passwords = ?, reset_token = ?, reset_timestamp = ? WHERE id = ?";
                    $stmt = mysqli_stmt_init($connectDB);
                    mysqli_stmt_prepare($stmt, $sql);
                    mysqli_stmt_bind_param($stmt,"ssss", $password,$token, $timestamp,$id);
                    
                    $execute = mysqli_stmt_execute($stmt);
        
                    if (!$execute) {
                        $_SESSION['error_msg'] = "Oops, something went wrong!";
                        header("Location: ../verify");
                    }else{
                        $_SESSION['success_msg'] = "Password has been changed, please log in!";
                        header("Location: ../login");
                    }
                }
            }
        }
    }
}
