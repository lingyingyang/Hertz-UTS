<?php
/**
 * Created by PhpStorm.
 * User: 30881
 * Date: 5/16/2019
 * Time: 1:37 PM
 */

// get request parameter
$id = $_GET["id"];

session_start();

// retrieve xml database
$xml = simplexml_load_file("../../database/cars.xml") or die("Error: Cannot create Object");
foreach ($xml->children() as $cars) {
    if ($id == $cars->id){
        // add item to shopping cart
        $car_detail = array(
            "Mileage" => (string) $cars->Mileage,
            "FuelType" => (string) $cars->FuelType,
            "Seats" => (string) $cars->Seats,
            "Description" => (string) $cars->Description,
            "Brand" => (string) $cars->Brand,
            "Model" => (string) $cars->Model,
            "Year" => (string) $cars->Year,
            "PricePerDay" => (int) $cars->PricePerDay,
            "RentalDays" => 1
        );
        if (!isset($_SESSION["cart"])) {
            $_SESSION["cart"] = array($id => $car_detail);
        } else if (!isset($_SESSION["cart"][$id])) {
            $_SESSION["cart"][$id] = $car_detail;
        }
        echo $cars->Availability;
        return;
    }
}
?>