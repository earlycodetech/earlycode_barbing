<?php
    require "../assets/modules/dbConnect.php";
    // 1. Check if the button is clicked
    // var_dump($_POST);
    session_start();


    if (!isset($_POST['login'])) {
        $_SESSION['error_msg'] = "You are not authorized to view this page";
        header("Location: ../login");
    }
    else{
        // 2. Collect Data
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        // 3. Build Constraints
        if ($email === "" || $password === "") {
            $_SESSION['error_msg'] = "Fields cannot be empty!";
            header("Location: ../login");
        }
        elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $_SESSION['error_msg'] = "Invalid Email!";
            header("Location: ../login");
        }
        else {

            $sql = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_stmt_init($connectDB);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt,"s",  $email);

            $execute = mysqli_stmt_execute($stmt);

            if (!$execute) {
                $_SESSION['error_msg'] = "Oops, something went wrong!";
                header("Location: ../login");
            }else{

              $result = mysqli_stmt_get_result($stmt);
        
              $numRows = mysqli_num_rows($result);

              if ($numRows < 1) {
                $_SESSION['error_msg'] = "This email does not exist!";
                header("Location: ../login");
              }else{
                $row = mysqli_fetch_assoc($result);
                $hash = $row['passwords'];

                if (!password_verify($password, $hash)) {
                    $_SESSION['error_msg'] = "Incorrect Password!";
                    header("Location: ../login");
                }else{
                    $_SESSION['user'] = $row['id'];

                    header('Location: ../users/dashboard');
                }

                print_r($row);
              }
            }
        }
    }