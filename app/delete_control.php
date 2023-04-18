<?php
require "../assets/modules/dbConnect.php";
require "../assets/modules/sessions.php";

if (!isset($_POST['delete-style'])) {
    header('Location: logout');
} else {
    $styleId = $_POST['style_id'];

    $sql = "DELETE FROM styles WHERE id = ?";
    $stmt = mysqli_stmt_init($connectDB);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $styleId);

    $execute = mysqli_stmt_execute($stmt);

    if (!$execute) {
        $_SESSION['error_msg'] = "Oops, something went wrong!";
        header("Location: ../users/style");
    } else {
        $_SESSION['success_msg'] = "Style deleted successfully!";
        header("Location: ../users/style");
    }
}
