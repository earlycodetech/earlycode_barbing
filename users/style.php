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
            <?php echo success_msg(); echo error_msg(); ?>
            <div class="card-body">
                <form action="../app/style_control.php" enctype="multipart/form-data" method="post">
                    <label for="">Title:</label>
                    <input type="text" name="title" class="form-control mb-3">
                    
                    <label for="">Upload Image</label>
                    <input type="file" name="file" accept="image/*" class="form-control mb-3">

                    <button class="btn btn-primary" name="upload-style">Save</button>
                </form>
            </div>
        </div>


        <div class="table-responsive my-4">
            <table class="table table-bordered table-dark">
                <thead>
                    <tr>
                        <th scope="row">ID</th>
                        <th scope="row">Title</th>
                        <th scope="row">Image</th>
                        <th scope="row">...</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Low Cut</td>
                        <td>
                            <a href="" class="btn btn-primary">View</a>
                        </td>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="">
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
    </section>
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>