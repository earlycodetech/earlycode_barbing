<?php
    require "../assets/modules/dbConnect.php";
    require '../assets/modules/sessions.php';
    authGuard();

    $id = $_SESSION['user'];
    $sql = "SELECT * FROM users WHERE id = '$id' ";
    $query = mysqli_query($connectDB, $sql);

    $user = mysqli_fetch_assoc($query);
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
                <?php echo success_msg(); echo error_msg(); ?>
                    <!-- Form to update picture -->
                    <form action="../app/avatar_control.php" method="post" enctype="multipart/form-data">
                        <label for="fileSelect">
                            <img src="../assets/img/avatars/<?php echo $user['avatar'].'?'.mt_rand() ?>" style="object-fit: cover; object-position: top;" width="150" height="150" class="rounded">
                        </label>
                        <div class="input-group w-50 my-4">
                            <input type="file" id="fileSelect" name="file" accept="image/*" class="form-control">
                            <button class="btn btn-success" name="upload">Update Photo</button>
                        </div>
                    </form>


                    <!-- Form to Update Details -->
                    <form action="../app/update_control.php" method="post">
                        <label for="" class="form-label">Full Name:</label>
                        <input type="text" name="full_name" value="<?php echo $user['full_name'] ?>" class="form-control mb-3">

                        <label for="" class="form-label">Email:</label>
                        <input type="text"  value="<?php echo $user['email'] ?>" disabled class="form-control mb-3">

                        <label for="" class="form-label">Phone:</label>
                        <input type="text" name="phone" value="<?php echo $user['phone'] ?>" class="form-control mb-3">

                        <label for="" class="form-label">Date Of Birth:</label>
                        <input type="date" name="dob" value="<?php echo $user['dob'] ?>" class="form-control mb-3">

                        <button class="btn btn-primary my-3" name="update">
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