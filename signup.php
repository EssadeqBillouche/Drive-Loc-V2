<?php
require_once 'classes/Autoloader.php';
use classes\Autoloader;
Autoloader::AutoloaderFunction();
use classes\user;
use classes\person;



if(isset($_POST['SubmitSingUp'])){
    $username = $_POST['name'];
    $email = $_POST['email'];
    $password = trim($_POST['password']);
    $repassword = trim($_POST['repassword']);

    echo $password;

    $regexEmail = "/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/";
    $regexPassword = "/^.{6,}$/";

   if($password != $repassword){
       echo '<div class="alert alert-danger" role="alert">password not Match</div>';
   }elseif (!preg_match($regexEmail, $email)){
       echo '<div class="alert alert-danger" role="alert">Invalid email format</div>';
   }elseif (!preg_match($regexPassword, $password)){
       echo '<div class="alert alert-danger" role="alert">Password must be at least 6 characters long</div>';
   }elseif (user::EmailExists($email)){
       echo '<div class="alert alert-danger" role="alert">the email already exists</div>';
   }else{
        $newUser = new user($username, $email, $password,1);
        $newUser->singup($username,$email, $password);
   }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Sing Up</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
    <div class="row">
        <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
            <div class="d-inline-flex align-items-center">
                <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</a>
                <span class="text-body">|</span>
                <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>info@example.com</a>
            </div>
        </div>
        <div class="col-md-6 text-center text-lg-right">
            <div class="d-inline-flex align-items-center">
                <a class="text-body px-3" href="">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a class="text-body px-3" href="">
                    <i class="fab fa-twitter"></i>
                </a>
                <a class="text-body px-3" href="">
                    <i class="fab fa-linkedin-in"></i>
                </a>
                <a class="text-body px-3" href="">
                    <i class="fab fa-instagram"></i>
                </a>
                <a class="text-body pl-3" href="">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- Topbar End -->
<!-- Navbar Start -->
<div class="container-fluid position-relative nav-bar p-0">
    <div class="position-relative px-lg-5" style="z-index: 9;">
        <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
            <a href="" class="navbar-brand">
                <h1 class="text-uppercase text-primary mb-1">Royal Cars</h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                <div class="navbar-nav ml-auto py-0">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="pagination.php" class="nav-item nav-link">Cars</a>
                    <a href="login.php" class="nav-item nav-link"><span class="btn btn-primary py-md-1 px-md-3">Login</span></a>
                </div>
            </div>
        </nav>
    </div>
</div><!-- Navbar End -->


<!-- Signup Page -->
<div class="container-fluid py-5" style="background: var(--light);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card border-0 shadow">
                    <div class="card-header bg-secondary text-center p-4">
                        <h1 class="text-white m-0">Sign Up</h1>
                    </div>
                    <div class="card-body rounded-bottom bg-white p-5">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control p-4" name = 'name' placeholder="Your name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control p-4" name = 'email' placeholder="Your email" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control p-4" name = 'password' placeholder="Password" required>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control p-4" name = 'repassword' placeholder="Confirm password" required>
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-primary btn-block py-3" name = 'SubmitSingUp' type="submit">Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<style>
    .btn-primary {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .btn-primary:hover {
        background-color: #e06c09;
        border-color: #e06c09;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 0.2rem rgba(247, 125, 10, 0.25);
    }
</style>


<!-- Footer Start -->
<div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
    <div class="row pt-5">
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
            <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>123 Street, New York, USA</p>
            <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+012 345 67890</p>
            <p><i class="fa fa-envelope text-white mr-3"></i>info@example.com</p>
            <h6 class="text-uppercase text-white py-2">Follow Us</h6>
            <div class="d-flex justify-content-start">
                <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-lg btn-dark btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Private Policy</a>
                <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Term & Conditions</a>
                <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>New Member Registration</a>
                <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Affiliate Programme</a>
                <a class="text-body mb-2" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Return & Refund</a>
                <a class="text-body" href="#"><i class="fa fa-angle-right text-white mr-2"></i>Help & FQAs</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-uppercase text-light mb-4">Car Gallery</h4>
            <div class="row mx-n1">
                <div class="col-4 px-1 mb-2">
                    <a href=""><img class="w-100" src="img/gallery-1.jpg" alt=""></a>
                </div>
                <div class="col-4 px-1 mb-2">
                    <a href=""><img class="w-100" src="img/gallery-2.jpg" alt=""></a>
                </div>
                <div class="col-4 px-1 mb-2">
                    <a href=""><img class="w-100" src="img/gallery-3.jpg" alt=""></a>
                </div>
                <div class="col-4 px-1 mb-2">
                    <a href=""><img class="w-100" src="img/gallery-4.jpg" alt=""></a>
                </div>
                <div class="col-4 px-1 mb-2">
                    <a href=""><img class="w-100" src="img/gallery-5.jpg" alt=""></a>
                </div>
                <div class="col-4 px-1 mb-2">
                    <a href=""><img class="w-100" src="img/gallery-6.jpg" alt=""></a>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="text-uppercase text-light mb-4">Newsletter</h4>
            <p class="mb-4">Volup amet magna clita tempor. Tempor sea eos vero ipsum. Lorem lorem sit sed elitr sed kasd et</p>
            <div class="w-100 mb-3">
                <div class="input-group">
                    <input type="text" class="form-control bg-dark border-dark" style="padding: 25px;" placeholder="Your Email">
                    <div class="input-group-append">
                        <button class="btn btn-primary text-uppercase px-3">Sign Up</button>
                    </div>
                </div>
            </div>
            <i>Lorem sit sed elitr sed kasd et</i>
        </div>
    </div>
</div>
<div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
    <p class="mb-2 text-center text-body">&copy; <a href="#">Your Site Name</a>. All Rights Reserved.</p>

    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
    <p class="m-0 text-center text-body">Designed by <a href="https://htmlcodex.com">HTML Codex</a></p>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>
<script src="lib/tempusdominus/js/moment.min.js"></script>
<script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
<script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>