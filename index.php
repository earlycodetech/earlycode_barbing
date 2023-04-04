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


    <!-- Carousel -->
    <section>
        <div id="carouselExampleCaptions" class="carousel carousel-fade slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/img/slide-1.jpg" style="aspect-ratio: 16/8; filter: blur(2px); object-fit: cover;"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption text-warning top-50">
                        <h5 class="fs-1 fw-bold">Early Code Saloon</h5>
    
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/slide-2.jpg" style="aspect-ratio: 16/8; filter: blur(2px); object-fit: cover;"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption text-warning top-50">
                        <h5 class="fs-1 fw-bold">Ladies Space Available</h5>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="assets/img/slide-3.jpg" style="aspect-ratio: 16/8; filter: blur(2px); object-fit: cover;"
                        class="d-block w-100" alt="...">
                    <div class="carousel-caption text-warning top-50">
                        <h5 class="fs-1 fw-bold">Make Us Your Boys Cave</h5>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </section>

    <!-- Services -->
    <section class="border-bottom border-light">
        <div class="container py-4">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <div class="position-relative">
                        <img src="assets/img/large.jpg" alt="big" style="object-fit: cover;" class="w-100 h-100 rounded-3">
                        <p class="position-absolute fs-3 text-white fw-bold w-100 text-center top-50">
                           Experienced Hands <br> Only
                        </p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="shadow position-relative ">
                        <img src="assets/img/care.jpg" alt="care" class="img-fluid rounded-3">
                        <p class="position-absolute fs-3 text-white fw-bold w-100 text-center top-50">
                            We take Proper Care <br> of Your Hair
                        </p>
                    </div>
                    <div class="shadow position-relative mb-4">
                        <img src="assets/img/standard-equipment.jpg" alt="care" class="img-fluid rounded-3">
                        <p class="position-absolute fs-3 text-white fw-bold w-100 text-center top-50">
                           Only The Best Equipment <br> Touches Your Hair
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Styles -->

<section class="border-bottom border-white">
    <div class="container my-4">
        <p class="text-center fs-2 fst-italic fw-bold">
            Styles
        </p>

        <div class="row">
            <div class="col-lg-3 col-md-4 col-6 mb-3">
                <div class="position-relative">
                    <img src="assets/img/style.jpg" alt="style" class="img-fluid rounded-3">
                    <div class="position-absolute top-0 start-0 w-100 h-100 rounded-3" style="background-color: #0000003e;"></div>

                    <p class="position-absolute w-100 text-center top-50 fw-bold text-white fs-5">
                        The Log
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 mb-3">
                <div class="position-relative">
                    <img src="assets/img/style.jpg" alt="style" class="img-fluid rounded-3">
                    <div class="position-absolute top-0 start-0 w-100 h-100 rounded-3" style="background-color: #0000003e;"></div>

                    <p class="position-absolute w-100 text-center top-50 fw-bold text-white fs-5">
                        The Log
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 mb-3">
                <div class="position-relative">
                    <img src="assets/img/style.jpg" alt="style" class="img-fluid rounded-3">
                    <div class="position-absolute top-0 start-0 w-100 h-100 rounded-3" style="background-color: #0000003e;"></div>

                    <p class="position-absolute w-100 text-center top-50 fw-bold text-white fs-5">
                        The Log
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-6 mb-3">
                <div class="position-relative">
                    <img src="assets/img/style.jpg" alt="style" class="img-fluid rounded-3">
                    <div class="position-absolute top-0 start-0 w-100 h-100 rounded-3" style="background-color: #0000003e;"></div>

                    <p class="position-absolute w-100 text-center top-50 fw-bold text-white fs-5">
                        The Log
                    </p>
                </div>
            </div>
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