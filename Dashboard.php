<?php
session_start();
require 'classes/Autoloader.php';
use classes\Autoloader;
use classes\category;
use classes\user;
use classes\car;
use classes\reservation;

Autoloader::AutoloaderFunction();

if (isset($_GET['approveId'])) {
    $reservationId = $_GET['approveId'];
    echo $reservationId;
    $newReservation = new reservation();
    $newReservation->changeStatus('Accepted', $reservationId);
    header('location: dashboard.php');
}
if (isset($_GET['refuseId'])) {
    $reservationId = $_GET['refuseId'];
    echo $reservationId;
    $newReservation = new reservation();
    $newReservation->changeStatus('Refused', $reservationId);
    header('location: dashboard.php');
}
if ( $_SESSION['role'] == 1) {

}else{
    header("location:index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ROYAL CARS - Car Rental HTML Template</title>
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
<div class="container-fluid">
    <!-- Header -->
    <div class="row bg-dark text-white py-3 align-items-center">
        <div class="col-md-6">
            <h4 class="ml-3">Admin Dashboard</h4>
        </div>
        <div class="col-md-6 text-right">
            <div class="d-inline-flex align-items-center">
                <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-1024.png" class="rounded-circle" style="width: 50px; height: 50px;">
                <?php
                echo '<span class="ml-2">Admin '.$_SESSION['name'].'</span>';
                ?>
                <form action="logout.php" method="POST" style="display: inline;">
                    <button type="submit" class="btn btn-danger btn-sm ml-3">
                        <i class="fa fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <!-- Sidebar -->

        <div class="col-md-3 bg-light vh-100 pt-4">
            <h5 class="text-uppercase">Actions</h5>
            <hr>
            <!-- Add New Car Button -->
            <button class="btn btn-primary btn-block mb-3 d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#addCarModal">
                <i class="fa fa-car me-2"></i> Add New Car
            </button>
            <button class="btn btn-info btn-block mb-3 d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#addMultipleCarsModal">
                <i class="fa fa-cars me-2"></i> Add Multiple Cars
            </button>
            <button class="btn btn-success btn-block mb-3 d-flex align-items-center justify-content-center" data-toggle="modal" data-target="#addCategoryModal">
                <i class="fa fa-folder-plus me-2"></i> Add New Category
            </button>
            <button class="btn btn-warning btn-block mb-3 d-flex align-items-center justify-content-center text-white" data-toggle="modal" data-target="#manageReviewsModal">
                <i class="fa fa-star me-2"></i> Manage Reviews
            </button>

        </div>



        <!--    New Category    -->
        <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addCategoryModalLabel">Add New Category</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addCategoryForm" action="DashBoardHnadling.php" method="post">
                            <div class="form-group">
                                <label for="categoryName">Category Name</label>
                                <input type="text" class="form-control" name = "categoryName" id="categoryName" placeholder="Enter category name" required>
                            </div>
                            <div class="form-group">
                                <label for="categoryDescription">Description</label>
                                <textarea class="form-control" name = "categoryDescription" id="categoryDescription" rows="3" placeholder="Enter category description" required></textarea>
                            </div>
                            <button type="submit" name = "addCategory" class="btn btn-primary btn-block mt-3">
                                <i class="fa fa-save"></i> Save Category
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

<!--        manage reviews-->

        <div class="modal fade" id="manageReviewsModal" tabindex="-1" role="dialog" aria-labelledby="manageReviewsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="manageReviewsModalLabel">Manage Reviews</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Review ID</th>
                                    <th>Customer Name</th>
                                    <th>Review</th>
                                    <th>Rating</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>John Doe</td>
                                    <td>Great service and excellent car quality!</td>
                                    <td>⭐⭐⭐⭐⭐</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-review" data-id="1">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Jane Smith</td>
                                    <td>Pickup was smooth, but the car had a slight issue.</td>
                                    <td>⭐⭐⭐⭐</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-review" data-id="2">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Mike Johnson</td>
                                    <td>Not satisfied with the customer support.</td>
                                    <td>⭐⭐⭐</td>
                                    <td>
                                        <button class="btn btn-danger btn-sm delete-review" data-id="3">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">
                            <i class="fa fa-times"></i> Close
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <!-- Add Multiple Cars Modal -->
        <div class="modal fade" id="addMultipleCarsModal" tabindex="-1" role="dialog" aria-labelledby="addMultipleCarsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addMultipleCarsModalLabel">Add Multiple Cars</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="multipleCarsForm" action="DashBoardHnadling.php" method="POST">
                            <div id="carFormsContainer">
                                <!-- Dynamic Car Form Template -->
                                <div class="car-form-template">
                                    <h6 class="text-uppercase mb-3">Car 1</h6>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="carName1">Car Name</label>
                                            <input type="text" class="form-control" id="carName1" name="carName[]" placeholder="Car Name" required>
                                        </div>

                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="year1">Year of Manufacture</label>
                                            <input type="number" class="form-control" id="year1" name="year[]" placeholder="Year" required>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="gearbox1">Gearbox Type</label>
                                            <select id="gearbox1" class="form-control" name="gearbox[]">
                                                <option value="AUTO">Automatic</option>
                                                <option value="Manual">Manual</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="gearbox1">Category</label>
                                            <select id="gearbox1" class="form-control" name="Category[]">
                                                 <?php
                                                    $Categories = category::displayAllCategories();
                                                    foreach ($Categories as $Category) {
                                                        echo '<option value="' . $Category["Category_id"] . '">' . $Category["Category_name"] . '</option>';
                                                    }
                                                 ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="gearbox1">availability</label>
                                            <select id="gearbox1" class="form-control" name="availability[]">
                                                <option value="availability">available</option>
                                                <option value="Occupied">Occupied</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="mileage1">Mileage</label>
                                            <input type="number" class="form-control" id="mileage1" name="mileage[]" placeholder="Mileage" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="price1">Price Per Day</label>
                                        <input type="number" class="form-control" id="price1" name="price[]" placeholder="Price Per Day" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="image1">Car Image</label>
                                        <input type="text" class="form-control" id="image1" name="image[]" required>
                                    </div>
                                    <hr>
                                </div>
                            </div>
                            <button type="button" class="btn btn-success mb-3" id="addCarFormButton">
                                <i class="fa fa-plus"></i> Add Another Car
                            </button>
                            <button type="submit" class="btn btn-primary btn-block" name="addCarFormMult">
                                <i class="fa fa-save"></i> Save All Cars
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Main Dashboard Area -->
        <!-- Statistics Section -->
        <div class="col-md-9 pt-4">  <!-- Statistics Section -->

            <div class="row mb-4">
                <div class="col-md-4">
                    <div class="card text-center bg-primary text-white">
                        <div class="card-body">
                            <i class="fa fa-car fa-2x mb-3"></i>
                            <h5>Total Cars</h5>
                            <?php
                                $CarNumber = car::carCount();
                                echo '<h2>'. $CarNumber . '</h2>';
                            ?>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center bg-success text-white">
                        <div class="card-body">
                            <i class="fa fa-calendar-check fa-2x mb-3"></i>
                            <h5>Total Reservations</h5>
                            <?php
                            $reservation = reservation::reservationCount();
                            echo '<h2>'. $reservation . '</h2>';
                            ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card text-center bg-warning text-white">
                        <div class="card-body">
                            <i class="fa fa-users fa-2x mb-3"></i>
                            <h5>Total Users</h5>
                            <?php
                            $UserCount = user::userCount();
                            echo '<h2>'. $UserCount . '</h2>';
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Reservations Management -->
            <div>
                <h3 class="text-uppercase mb-3">Reservations Management</h3>
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Reservation ID</th>
                            <th>Customer Name</th>
                            <th>Car Model</th>
                            <th>Pickup Date</th>
                            <th>Return Date</th>
                            <th>Pickup Location</th>
                            <th>Return Location</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $newReservation = new reservation();
                        $reservations = $newReservation->allResevations();
                        var_dump($reservations);
                        foreach ($reservations as $reservation) {
                            echo '<tr>
                            <td>'.htmlspecialchars($reservation["reservation_id"]).'</td>
                            <td>'.htmlspecialchars($reservation["user_name"]).'</td>
                            <td>'.htmlspecialchars($reservation["car_brand"]).'</td>
                            <td>'.htmlspecialchars($reservation["pickup_date"]).'</td>
                            <td>'.htmlspecialchars($reservation["drop_date"]).'</td>
                            <td>'.htmlspecialchars($reservation["pickup_location"]).'</td>
                            <td>'.htmlspecialchars($reservation["drop_location"]).'</td>
                            <td><span class="badge badge-warning">'.htmlspecialchars($reservation["statu"]).'</span></td>
                            <td><a href="Dashboard.php?approveId='.htmlspecialchars($reservation["reservation_id"]).'" class="btn btn-success btn-sm"><i class="fa fa-check"></i> Approve</a>
                                <a href="Dashboard.php?refuseId='.htmlspecialchars($reservation["reservation_id"]).'" class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Refuse</a>
                            </td>
                        </tr>';
                        }

                        ?>
                        <!-- Add more rows as needed -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add New Car Modal -->
<div class="modal fade" id="addCarModal" tabindex="-1" role="dialog" aria-labelledby="addCarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCarModalLabel">Add New Car</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="carName">Car Name</label>
                            <input type="text" class="form-control" id="carName" placeholder="Car Name" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="carModel">Car Model</label>
                            <input type="text" class="form-control" id="carModel" placeholder="Car Model" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="year">Year of Manufacture</label>
                            <input type="number" class="form-control" id="year" placeholder="Year" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="gearbox">Gearbox Type</label>
                            <select id="gearbox" class="form-control">
                                <option value="AUTO">Automatic</option>
                                <option value="Manual">Manual</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="mileage">Mileage</label>
                            <input type="number" class="form-control" id="mileage" placeholder="Mileage" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="price">Price Per Day</label>
                        <input type="number" class="form-control" id="price" placeholder="Price Per Day" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Car Image</label>
                        <input type="text" class="form-control" id="image" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-plus"></i> Add Car</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let carCount = 1; // Track the number of cars

    document.getElementById('addCarFormButton').addEventListener('click', function () {
        carCount++;
        const newCarForm = `
            <div class="car-form-template">
                <h6 class="text-uppercase mb-3">Car ${carCount}</h6>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="carName${carCount}">Car Name</label>
                        <input type="text" class="form-control" id="carName${carCount}" name="carName[]" placeholder="Car Name" required>
                    </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="year${carCount}">Year of Manufacture</label>
                        <input type="number" class="form-control" id="year${carCount}" name="year[]" placeholder="Year" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="gearbox${carCount}">Gearbox Type</label>
                        <select id="gearbox${carCount}" class="form-control" name="gearbox[]">
                            <option value="AUTO">Automatic</option>
                            <option value="Manual">Manual</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                                            <label for="gearbox1">Category</label>
                                            <select id="gearbox1" class="form-control" name="Category[]">
                                                 <?php
                                                        $Categories = category::displayAllCategories();
                                                        foreach ($Categories as $Category) {
                                                            echo '<option value="' . $Category["Category_id"] . '">' . $Category["Category_name"] . '</option>';

                                                        }
                                                        ?>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="gearbox1">availability</label>
                                            <select id="gearbox1" class="form-control" name="availability[]">
                                                <option value="available">available</option>
                                                <option value="Occupied">Occupied</option>
                                            </select>
                                        </div>

                    <div class="form-group col-md-4">
                        <label for="mileage${carCount}">Mileage</label>
                        <input type="number" class="form-control" id="mileage${carCount}" name="mileage[]" placeholder="Mileage" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="price${carCount}">Price Per Day</label>
                    <input type="number" class="form-control" id="price${carCount}" name="price[]" placeholder="Price Per Day" required>
                </div>
                <div class="form-group">
                    <label for="image${carCount}">Car Image</label>
                    <input type="text" class="form-control" id="image${carCount}" name="image[]" required>
                </div>
                <hr>
            </div>
        `;
        document.getElementById('carFormsContainer').insertAdjacentHTML('beforeend', newCarForm);
    });

    // Optional: Handle form submission
    // document.getElementById('multipleCarsForm').addEventListener('submit', function (e) {
    //     e.preventDefault();
    //     alert('All cars have been submitted!');
    // });
</script>





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