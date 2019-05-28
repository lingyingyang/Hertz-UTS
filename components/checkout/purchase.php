<?php
session_start();

// Send email
$to = $_REQUEST['emailAddr'];
$subject = 'Your Order Details';
$message = '<h1>This is a confirmation email of your order.</h1>
            <h2>Thanks for renting cars from Hertz-UTS, the total cost is $' . $_SESSION["total"] .
            '</h2><h2>Details are as follows:</h2>';

foreach ($_SESSION["cart"] as $id => $item) {
    $message .= 'Model: '.$item["Brand"].'-'.$item['Model'].'-'.$item['Year'];
    $message .= '<br>mileage: ' . $item["Mileage"] . ' kms';
    $message .= '<br>fuel_type: ' . $item['FuelType'];
    $message .= '<br>seats: ' . $item['Seats'];
    $message .= '<br>price_per_day: ' . $item['PricePerDay'];
    $message .= '<br>rent_days: ' . $item['RentalDays'];
    $message .= '<br>description: ' . $item['Description'];
    $message .= '<br><br>';
}


// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

//// More headers
$headers .= 'From: <12776136@student.uts.edu.au>' . "\r\n";
$headers .= "Return-Path: <12776136@student.uts.edu.au>\n";

mail($to, $subject, $message, $headers);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <title>Purchase</title>
</head>
<body>

    <div class="container text-center">
        <h1>Sent email successfully.</h1>
        <a href="../product/car_rental_center.html" target="mainFrame" class="btn btn-primary">Back to Home</a>
    </div>

</body>
<?php
session_destroy();
?>