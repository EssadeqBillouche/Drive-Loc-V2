<?php
namespace classes;
require_once "dbConnaction.php";
use PDO;
$db = dbConnaction::getConnection();
$stem = $db ->prepare("SELECT car_id, car_category,car_brand, car_image, car_price_per_day, car_availability, model, GearBox, mileage, category_name FROM car left join category on car.car_category = category.category_id");
$stem -> execute();
$cars = $stem -> fetchAll(PDO::FETCH_ASSOC);
$cars = json_encode($cars, JSON_PRETTY_PRINT);
header('Content-Type: application/json');
echo $cars;

