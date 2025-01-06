<?php
require 'classes/Autoloader.php';
use classes\Autoloader;
use classes\car;
use classes\category;
Autoloader::AutoloaderFunction();

if (isset($_POST['addCarFormMult']))
{
    $carName = $_POST['carName'];
    $availability = $_POST['availability'];
    $category = $_POST['Category'];
    $gearbox = $_POST['gearbox'];
    $mileage = $_POST['mileage'];
    $year = $_POST['year'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    $availability = $_POST['availability'];
    $NewCar = new Car();
    foreach ($carName as $index => $cars) {
        $NewCar->addCar($carName[$index],$price[$index],$image[$index],$year[$index],$availability[$index],$gearbox[$index],$mileage[$index],$category[$index]);
    }

}elseif (isset($_POST['addCategory'])) {
    $categoryName = $_POST['categoryName'];
    $categoryDescription = $_POST['categoryDescription'];
    $category = new Category($categoryName, $categoryDescription);
    $result = $category->AddCategory($categoryName, $categoryDescription);

    if ($result) {
        echo "Category added successfully.";
        header("location: Dashboard.php");
    } else {
        echo "Category already exists.";
    }
}elseif (isset($_POST['editReview'])){

}

?>