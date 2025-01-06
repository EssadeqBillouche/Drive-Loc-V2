<?php
session_start();
require_once 'classes/Autoloader.php';
require 'logout.php';
use classes\Autoloader;
use classes\Rating;
use classes\person;

if (isset($_POST['submit'])) {
    $userId = $_GET['useId'];
    $carId = $_GET['carId'];
    $reId = $_GET['reId'];
    $rating = $_POST['rating'];
    $newRating = new Rating();
    $newRating->addRating($carId,$userId, $reId,$rating,'active');
    header('location: UserPage.php');
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rating</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #F77D0A;
            --secondary: #2B2E4A;
            --light: #F4F5F8;
            --dark: #1C1E32;
        }

        .rating-container {
            background: var(--light);
            transition: .5s;
            padding: 40px;
            border-radius: 10px;
            text-align: center;
        }

        .rating-container:hover {
            background: var(--secondary);
            color: var(--light);
        }

        .range-wrap {
            position: relative;
            margin: 30px auto;
            width: 100%;
            max-width: 400px;
        }

        .range {
            width: 100%;
            cursor: pointer;
            height: 15px;
            -webkit-appearance: none;
            background: transparent;
        }

        .range::-webkit-slider-runnable-track {
            width: 100%;
            height: 15px;
            background: #ddd;
            border-radius: 10px;
        }

        .range::-webkit-slider-thumb {
            -webkit-appearance: none;
            height: 25px;
            width: 25px;
            background: var(--primary);
            border-radius: 50%;
            margin-top: -5px;
            cursor: pointer;
            transition: .3s;
        }

        .range::-webkit-slider-thumb:hover {
            background: var(--secondary);
        }

        /* Firefox styles */
        .range::-moz-range-track {
            width: 100%;
            height: 15px;
            background: #ddd;
            border-radius: 10px;
        }

        .range::-moz-range-thumb {
            height: 25px;
            width: 25px;
            background: var(--primary);
            border-radius: 50%;
            margin-top: -5px;
            cursor: pointer;
            transition: .3s;
            border: none;
        }

        .range::-moz-range-thumb:hover {
            background: var(--secondary);
        }

        /* Edge styles */
        .range::-ms-track {
            width: 100%;
            height: 15px;
            background: #ddd;
            border-radius: 10px;
        }

        .range::-ms-thumb {
            height: 25px;
            width: 25px;
            background: var(--primary);
            border-radius: 50%;
            margin-top: -5px;
            cursor: pointer;
            transition: .3s;
        }

        .range::-ms-thumb:hover {
            background: var(--secondary);
        }

        .rating-value {
            font-size: 24px;
            font-weight: bold;
            color: var(--primary);
            margin: 20px 0;
        }

        /* Output styling */
        .range-output {
            display: block;
            margin-top: 20px;
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary);
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="rating-container">
                <h2 class="mb-4 font-weight-bold">Rate This Car</h2>
                <form action="" method="post" class="range-wrap">
                    <input type="range" name='rating' class="range" min="0" max="5" value="0" step="0.5" oninput="this.nextElementSibling.value = this.value">
                    <output class="range-output">0</output>
                    <button name="submit" type="submit" class="btn btn-warning">Send Rating</button>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>