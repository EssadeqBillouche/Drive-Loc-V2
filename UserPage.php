<?php

use classes\car;
use classes\reservation;
session_start();
require_once 'classes/Autoloader.php';
require 'logout.php';
use classes\Autoloader;
use classes\user;
use classes\person;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings & Bookings - Car Rental</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --primary: #F77D0A;
            --secondary: #2B2E4A;
            --light: #F4F5F8;
            --dark: #1C1E32;
        }

        .sidebar {
            background-color: var(--dark);
            color: var(--light);
            height: 100vh;
            width: 250px;
            position: fixed;
            left: 0;
            top: 0;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        .nav-link {
            color: var(--light);
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-link:hover, .nav-link.active {
            background-color: var(--primary);
            color: white;
        }

        .profile-pic {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
        }

        .update-picture {
            color: var(--primary);
            text-decoration: none;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 0.25rem rgba(247, 125, 10, 0.25);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .btn-primary:hover {
            background-color: #e67409;
            border-color: #e67409;
        }

        .booking-card {
            background: var(--light);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .booking-status {
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 14px;
        }

        .status-active {
            background-color: #e1f7e1;
            color: #28a745;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-completed {
            background-color: #cce5ff;
            color: #004085;
        }

        .logout-btn {
            position: absolute;
            bottom: 20px;
            width: calc(100% - 40px);
            margin: 0 20px;
            background-color: #363853;
            color: var(--light);
            border: none;
        }

        .top-bar {
            background-color: white;
            padding: 15px 30px;
            border-bottom: 1px solid #eee;
        }

        .search-box {
            max-width: 400px;
            position: relative;
        }

        .search-box input {
            background-color: var(--light);
            border: none;
            padding-left: 40px;
        }

        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
        }
    </style>

</head>
<body>
<!-- Sidebar -->
<div class="sidebar">
    <div class="p-3">
        <h4 class="text-light mb-4">
            <i class="fas fa-car me-2"></i>CAR RENT
        </h4>
    </div>

    <nav>
        <a href="index.php" class="nav-link">
            <i class="fas fa-bell"></i>
            Home
        </a>
        <a href="pagination.php" class="nav-link">
            <i class="fas fa-user"></i>
            Car List
        </a>
        <a href="#bookings" class="nav-link" onclick="showTab('bookings')">
            <i class="fas fa-calendar"></i>
            Bookings
        </a>
        <a href="#settings" class="nav-link active" onclick="showTab('settings')">
            <i class="fas fa-cog"></i>
            Settings
        </a>
        <a href="#" class="nav-link">
            <i class="fas fa-file-alt"></i>
            Report
        </a>
    </nav>

    <button class="btn logout-btn">
        <i class="fas fa-sign-out-alt me-2"></i>
        Logout
    </button>
</div>

<!-- Main Content -->
<div class="main-content">
    <!-- Top Bar -->
    <div class="top-bar d-flex justify-content-between align-items-center">
        <div class="search-box">
            <i class="fas fa-search"></i>
            <input type="text" class="form-control" placeholder="Search here">
        </div>
        <div class="d-flex align-items-center gap-3">
            <i class="fas fa-bell"></i>
            <img src="https://cdn1.iconfinder.com/data/icons/user-pictures/101/malecostume-1024.png" class="rounded-circle" style="width: 50px; height: 50px;">
            <?php
            echo '<span class="ml-2"> '.$_SESSION['name'].'</span>';
            ?>
            <i class="fas fa-chevron-down"></i>
        </div>
    </div>

    <script>

    </script>


    <!-- Settings Section -->
    <div id="settings" class="tab-content active">
        <div class="container mt-4">
            <h4 class="mb-4">Profile Information</h4>
            <div class="row">
                <div class="col-md-3 text-center">
                    <img src="/api/placeholder/120/120" class="profile-pic mb-3">
                    <div>
                        <a href="#" class="update-picture">Update Picture</a>
                    </div>
                    <h5 class="mt-3">Mason Wilson</h5>
                    <p class="text-muted">Admin</p>
                </div>

                <div class="col-md-9">
                    <form>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" value="Mason">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" value="Wilson">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" class="form-control" value="masonwilson123@gmail.com">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Phone number</label>
                            <input type="tel" class="form-control" value="+1 (555) 000-0000">
                        </div>

                        <h5 class="mt-4 mb-3">Notifications</h5>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label">New Bookings</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label">Cancellation</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox">
                                <label class="form-check-label">Due Payment</label>
                            </div>
                        </div>
                        <div class="mb-4">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" checked>
                                <label class="form-check-label">Maintenance</label>
                            </div>
                        </div>

                        <button class="btn btn-primary px-4">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bookings Section -->
    <div id="bookings" class="tab-content">
        <div class="container mt-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4>My Bookings</h4>
                <button class="btn btn-primary">
                    <i class="fas fa-plus me-2"></i>New Booking
                </button>
            </div>

            <!-- Booking Cards -->
            <div class="row">
                <?php

                $newreservation = new reservation();
                $result = $newreservation->reservationByUserId($_SESSION['id']);
                var_dump($result);
                $newcar = new car();
                echo '<br>';

                foreach ($result as $row) {
                    if ($row["statu"] === 'completed')
                    {

                        $statusRating = '<span class="booking-status status-completed">Completed</span>';
                        $LeaveRating = '<a href="rating.php?useId='.$row["user_fk"].'&carId='.$row["car_fk"].'&reId='.$row["user_fk"].'" class="btn btn-primary btn-sm">Add Rating </a>';
                    }elseif ($row["statu"] === 'cancled'){
                        $statusRating = '<span class="booking-status status-cancelled">Cancelled</span>';
                        $LeaveRating = '';
                    }elseif ($row["statu"] === 'Pending'){
                        $statusRating = '<span class="booking-status status-pending">Pending</span>';
                        $LeaveRating = '';
                    }elseif ($row["statu"] === 'Accepted'){
                        $statusRating = '<span class="booking-status status-active">Active</span>';
                        $LeaveRating = '';
                    }

                    $car = $newcar->carById($row["car_fk"]);
                    $carName = $car["car_brand"];
                    $carPrice = $car["car_price_per_day"];

                    echo '<div class="col-md-6 mb-4">
                    <div class="booking-card p-4">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div>
                                <h5 class="mb-1">'.$carName.'</h5>
                                <p class="text-muted mb-0">Booking ID: '.$row["reservation_id"].'</p>
                            </div>
                            '.$statusRating.'
                        </div>
                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted">Pickup Date</small>
                                <p class="mb-0">'.$row["pickup_date"].'</p>
                            </div>
                            <div class="col-6">
                                <small class="text-muted">Return Date</small>
                                <p class="mb-0">'.$row["drop_date"].'</p>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">$'.$carPrice.'/day</h5>
                            '.$LeaveRating.'
                        </div>
                    </div>
                </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.2/js/bootstrap.bundle.min.js"></script>
<script src="js/MyJsScript.js">
</script>
</body>
</html>