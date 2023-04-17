<?php
require "../assets/modules/dbConnect.php";
require "../assets/modules/sessions.php";

if (!isset($_POST['upload'])) {
    header('Location: logout');
} else {
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

    if (!in_array($ext, $allowedFiles)) {
        $_SESSION['error_msg'] = "File type not supported. Examples:  .jpg, .jpeg, .gif, .png !";
        header("Location: ../users/profile");
    } elseif ($fileError != 0) {
        $_SESSION['error_msg'] = "File is corrupted!";
        header("Location: ../users/profile");
    } elseif ($fileSize > 5000000) {
        $_SESSION['error_msg'] = "File is too large. max: 5mb!";
        header("Location: ../users/profile");
    } else {
        // Generate a new name for the file
        $id = $_SESSION['user'];
        $fileNewName = 'early_code_barbing_avatar_' . $id . '.' . $ext;

        // Location to store our file
        $storageLocation = "../assets/img/avatars/";

        // Move the file from the Temporary location to the storage location
        $move = move_uploaded_file($fileTmpLoc, $storageLocation . $fileNewName);
        if (!$move) {
            $_SESSION['error_msg'] = "Failed to upload !";
            header("Location: ../users/profile");
        }
        else {
            $sql = "UPDATE users SET avatar = ? WHERE id = ?";
            $stmt = mysqli_stmt_init($connectDB);
            mysqli_stmt_prepare($stmt, $sql);
            mysqli_stmt_bind_param($stmt,"ss", $fileNewName,$id);

            $execute = mysqli_stmt_execute($stmt);
            
            if (!$execute) {
                $_SESSION['error_msg'] = "Oops, something went wrong!";
                header("Location: ../users/profile");
            }else{
                $_SESSION['success_msg'] = "Avatar uploaded successfully!";
                header("Location: ../users/profile");
            }
        }
    }
}
