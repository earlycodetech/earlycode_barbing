<?php
require "../assets/modules/dbConnect.php";
require "../assets/modules/sessions.php";

if (!isset($_POST['upload-style'])) {
    header('Location: logout');
} else {
    $title = $_POST['title'];
    $file = $_FILES['file'];

    $fileName = $file['name'];
    $fileTmpLoc = $file['tmp_name'];
    $fileError = $file['error'];
    $fileSize = $file['size'];

    // Get the file Extension
    $ext = explode('.', $fileName);
    $ext = end($ext);
    $ext = strtolower($ext);

    // This is the type of files that we will allow in our file system.
    $allowedFiles = ['jpg', 'png', 'jpeg', 'gif'];

    if (trim($title) === '') {
        $_SESSION['error_msg'] = "Please enter the title !";
        header("Location: ../users/style");
    }
    elseif (!in_array($ext, $allowedFiles)) {
        $_SESSION['error_msg'] = "File type not supported. Examples:  .jpg, .jpeg, .gif, .png !";
        header("Location: ../users/style");
    } elseif ($fileError != 0) {
        $_SESSION['error_msg'] = "File is corrupted!";
        header("Location: ../users/style");
    } elseif ($fileSize > 5000000) {
        $_SESSION['error_msg'] = "File is too large. max: 5mb!";
        header("Location: ../users/style");
    } else {
        // Generate a new name for the file
        $id = $_SESSION['user'];
        $fileNewName = 'early_code_barbing_style_'.rand(100000, 999999) . '.' . $ext;

        // Location to store our file
        $storageLocation = "../assets/img/styles/";

        // Move the file from the Temporary location to the storage location
        $move = move_uploaded_file($fileTmpLoc, $storageLocation . $fileNewName);
        if (!$move) {
            $_SESSION['error_msg'] = "Failed to upload !";
            header("Location: ../users/style");
        }
        else {
            $sql = "INSERT INTO styles(userid, title, style_image) VALUE(?,?,?)";
            $stmt = mysqli_stmt_init($connectDB);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt,"sss",$id, $title, $fileNewName);

            $execute = mysqli_stmt_execute($stmt);
            
            if (!$execute) {
                $_SESSION['error_msg'] = "Oops, something went wrong!";
                header("Location: ../users/style");
            }else{
                $_SESSION['success_msg'] = "Style saved successfully!";
                header("Location: ../users/style");
            }
        }
    }
}
