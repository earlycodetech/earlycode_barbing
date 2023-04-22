<?php
    require "assets/modules/sessions.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbing</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
</head>

<body class="bg-warning">
    <!-- Nav -->
    <section>
        <?php
            include_once "assets/modules/nav.php";
        ?>
    </section>

    <section class="border-bottom border-top border-white py-5">
        <div class="container">
            <div class="card mx-auto" style="max-width: 500px;">
                <div class="p-2">
                    <?php echo error_msg(); echo success_msg(); echo time(); ?>
                </div>
        
                <form  method="post" action="app/reset_password_control.php" class="card-body">
                    <div class="card-header bg-transparent text-center mb-3">Reset Your Password</div>

                    <label for="" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control mb-3">

                    <button name="send-token" class="btn btn-primary">
                        Reset
                    </button>

                </form>
            </div>
        </div>
    </section>


    <!-- footer -->
    <section class="border-bottom border-white">
        <div class="row container my-5 ">
            <div class="col-lg-4 mb-3 text-center">
                <img src="assets/img/logo.png" alt="logo" width="100" height="100" class="img-thumbnail rounded-circle">
            </div>

            <div class="col-lg-4"></div>
            <div class="col-lg-4 mb-3">
                <ul class="d-flex flex-column list-unstyled gap-4 align-items-center align-items-lg-start">
                    <li>
                        <a href="index.php" class="nav-link text-white">Home</a>
                    </li>
                    <li>
                        <a href="contact.php" class="nav-link text-white">Contact</a>
                    </li>
                    <li>
                        <a href="appointment.php" class="btn btn-secondary text-white">Bool Appointment</a>
                    </li>
                </ul>
            </div>
        </div>

    </section>

    <p class="text-center py-3 text-light">
        &copy; 2023. Early Code Saloon
    </p>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>