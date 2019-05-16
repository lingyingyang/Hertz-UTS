<?php
/**
 * Created by PhpStorm.
 * User: 30881
 * Date: 5/16/2019
 * Time: 3:23 PM
 */

// Delete id
$id = $_POST["id"];
session_start();
unset($_SESSION["cart"][$id]);

// Relocate to reservation component
header("Location: car_reservation.php");
?>