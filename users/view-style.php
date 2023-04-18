<?php
    require "../assets/modules/dbConnect.php";
    require '../assets/modules/sessions.php';
    authGuard();

    $id = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE id = '$id' ";
    $query = mysqli_query($connectDB, $sql);

    $user = mysqli_fetch_assoc($query); // This converts the php object to an associative array

    $q = $_GET['q'];
    $sql = "SELECT * FROM styles WHERE id = ?";
    $stmt = mysqli_stmt_init($connectDB);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "s", $q);

    $execute = mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) < 1) {
       $_SESSION['error_msg'] = "This style does not exist";
       header('Location: style');
    }else{
        $style = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
</head>

<body>
    <section>
       <?php include_once "../assets/modules/app_nav.php"; ?>
    </section>

    <section class="pt-4">
        <div class="container mt-5">

        <div class="card shadow mx-auto w-75">
            <?php echo success_msg(); echo error_msg(); ?>
            <div class="card-body">
                <h1><?php echo $style['title'] ?></h1>
                <img src="../assets/img/styles/<?php echo $style['style_image'] ?>" class="img-fluid" alt="">
            </div>
        </div>


        
        </div>
    </section>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>