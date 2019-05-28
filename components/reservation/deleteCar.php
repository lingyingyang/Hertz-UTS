<?php
// Delete id
$id = $_POST["id"];
session_start();
unset($_SESSION["cart"][$id]);

// Relocate to reservation component
header("Location: car_reservation.php");
?>