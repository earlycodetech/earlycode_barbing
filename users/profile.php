<?php
    require '../assets/modules/sessions.php';
    authGuard();
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
            <?php echo $_SESSION['user']; ?>

        <div class="card shadow mx-auto w-75">
            <div class="card-body">
                <!-- Form to update picture -->
                <form action="" method="post">
                    <label for="">
                        <img src="../assets/img/care.jpg" style="object-fit: cover; object-position: top;" width="150" height="150" class="rounded">
                    </label>
                    <div class="input-group w-50 my-4">
                        <input type="file" class="form-control">
                        <button class="btn btn-success">Update Photo</button>
                    </div>
                </form>


                <!-- Form to Update Details -->
                <form action="" method="post">
                    <label for="" class="form-label">Full Name:</label>
                    <input type="text" class="form-control mb-3">
                    <label for="" class="form-label">Email:</label>
                    <input type="text" class="form-control mb-3">
                    <label for="" class="form-label">Phone:</label>
                    <input type="text" class="form-control mb-3">
                    <label for="" class="form-label">Date Of Birth:</label>
                    <input type="text" class="form-control mb-3">

                    <button class="btn btn-primary my-3">
                        Update
                    </button>
                </form>
            </div>
        </div>
        </div>
    </section>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>