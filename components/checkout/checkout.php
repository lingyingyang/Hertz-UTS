<?php
session_start();

// calculate total payment
$total = 0;
$rentalDays = $_REQUEST["rentalDays"];
$index = 0;
foreach ($_SESSION["cart"] as $id => $item) {
    $_SESSION["cart"][$id]["RentalDays"] = $rentalDays[$index];
    $total += $rentalDays[$index++] * $item["PricePerDay"];
}
$_SESSION["total"]=$total;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../content/bootstrap.min.css">

    <title>Checkout</title>
</head>
<body>
    <h1 class="text-center">Check Out</h1>
    <div class="container mx-4">
        <h3>Customer Details and Payment</h3>
        <p class="text-info">Please fill in your details. * indicates  field</p>
        <form name="purchaseForm" method="post" action="purchase.php">
        <div class="form-group row">
            <label for="firstName" class="col-sm-2 col-form-label">First Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="lastName" class="col-sm-2 col-form-label">Last Name</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="lastName" id="lastName"  placeholder="Last Name">
            </div>
        </div>
        <div class="form-group row">
            <label for="emailAddr" class="col-sm-2 col-form-label">Email Address</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="emailAddr" id="emailAddr"  placeholder="Email Address">
            </div>
        </div>
        <div class="form-group row">
            <label for="addrLine1" class="col-sm-2 col-form-label">Address Line 1</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="addrLine1" id="addrLine1"  placeholder="Address Line 1">
            </div>
        </div>
        <div class="form-group row">
            <label for="addrLine2" class="col-sm-2 col-form-label">Address Line 2</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="addrLine2" id="addrLine2" placeholder="Address Line 2">
            </div>
        </div>
        <div class="form-group row">
            <label for="city" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="city" id="city"  placeholder="City">
            </div>
        </div>
        <div class="form-group row">
            <label for="state" class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-10">
                <select class="form-control" id="state" name="state">
                    <option selected>Please choose</option>
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label for="postCode" class="col-sm-2 col-form-label">Post Code</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="postCode" id="postCode"  placeholder="Post Code">
            </div>
        </div>
        <div class="form-group row">
            <label for="paymentType" class="col-sm-2 col-form-label">Payment Type</label>
            <div class="col-sm-10">
                <select class="form-control" id="paymentType" name="paymentType">
                    <option selected>Please choose</option>
                    <option>VISA</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                </select>
            </div>
        </div>
        <h3>You are  to pay $<?php echo $total;?></h3>
        <div class="form-group row">
            <div class="col-sm-10">
                <a href="../product/car_rental_center.php" target="mainFrame" class="btn btn-primary">Continue Selection</a>
                <button type="submit" class="btn btn-primary">Booking</button>
            </div>
        </div>
    </form>
    </div>
</body>
</html>