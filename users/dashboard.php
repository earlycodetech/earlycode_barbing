<?php
    require "../assets/modules/dbConnect.php";
    require '../assets/modules/sessions.php';
    authGuard();

    $id = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE id = '$id' ";
    $query = mysqli_query($connectDB, $sql);

    $user = mysqli_fetch_assoc($query); // This converts the php object to an associative array
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
            <div class="card-body">
                <p class="h3">Welcome <?php echo $user['full_name'] ?></p>

                <div class="row">
                    <div class="col-md-8 mb-2">
                        <div class="row border p-3 mb-3">
                            <div class="col-4">
                                Name:
                            </div>
                            <div class="col-8">
                            <?php echo $user['full_name'] ?>
                            </div>
                        </div>
        
                        <div class="row border p-3 mb-3">
                            <div class="col-4">
                                Email:
                            </div>
                            <div class="col-8">
                            <?php echo $user['email'] ?>
                            </div>
                        </div>
        
                        <div class="row border p-3 mb-3">
                            <div class="col-4">
                                Phone:
                            </div>
                            <div class="col-8">
                            <?php echo $user['phone'] ?>
                            </div>
                        </div>
        
                        <div class="row border p-3 mb-3">
                            <div class="col-4">
                                Date of Birth:
                            </div>
                            <div class="col-8">
                            <?php echo $user['dob'] ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 my-3">
                        <img src="../assets/img/large.jpg" style="object-fit: cover;" class="w-100" height="300">
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>