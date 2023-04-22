<?php
    require "../assets/modules/dbConnect.php";
    // 1. Check if the button is clicked
    // var_dump($_POST);
    session_start();



    if (!isset($_POST['send-token'])) {
        $_SESSION['error_msg'] = "You are not authorized to view this page";
        header("Location: ../reset-password");
    }else{
        $email = $_POST['email'];
        $token = rand(100000,999999);
        $timestamp = time(); // Returns the current timestamp in seconds

        if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['error_msg'] = "Invalid Email!";
            header("Location: ../reset-password");
        }else{
            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_stmt_init($connectDB);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt,"s",  $email);

            $execute = mysqli_stmt_execute($stmt);

            if (!$execute) {
                $_SESSION['error_msg'] = "Oops, something went wrong!";
                header("Location: ../reset-password");
            }else{

              $result = mysqli_stmt_get_result($stmt);
        
              $numRows = mysqli_num_rows($result);

              if ($numRows < 1) {
                $_SESSION['error_msg'] = "This account does not exist!";
                header("Location: ../reset-password");
              }else{
                $sql = "UPDATE users SET reset_token = ?, reset_timestamp = ? WHERE email = ?";
                $stmt = mysqli_stmt_init($connectDB);
                mysqli_stmt_prepare($stmt, $sql);
                mysqli_stmt_bind_param($stmt,"sss", $token, $timestamp, $email);
    
                $execute = mysqli_stmt_execute($stmt);
    
                if (!$execute) {
                    $_SESSION['error_msg'] = "Oops, something went wrong!";
                    header("Location: ../reset-password");
                }else{
                    // SEND THE TOKEN TO THE EMAIL
                    $to = $email;
                    $subject = "Reset your password";
                    $message = "
                        <div style=\"padding: 10px; background-color: #fff000;\">
                        Please use the one time password(OTP) to reset your password: <br> <h1 style='text-align: center;'>'$token' </h1>
                    ";
                    // $headers = "From: Barbing <support@earlycode_barbing.com>";

                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

                    // More headers
                    $headers .= 'From: Barbing <support@earlycode_barbing.com>' . "\r\n";

                    $mail = mail($to, $subject, $message, $headers);

                    if (!$mail) {
                        $_SESSION['error_msg'] = "Failed to send token, please try again!";
                        header("Location: ../reset-password");
                    }else{
                        $_SESSION['success_msg'] = "A reset token has been sent to your email!";
                        header("Location: ../verify"); 
                    }
                }
              }
            }
        }
    }