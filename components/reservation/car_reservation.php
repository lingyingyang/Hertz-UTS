<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../content/bootstrap.min.css">

    <title>Car Reservation</title>
</head>
<body>
    <h1 class="text-center">Car Reservation</h1>


        <?php
        session_start();
        if (empty($_SESSION["cart"])){
            echo '<div class="container text-center">';
            echo '<h2>No items. Please select cars</h2>';
            echo '<a href="../product/car_rental_center.php" target="mainFrame" class="btn btn-primary">Back to Home</a></div>';
        }else{
            echo '<form id="checkoutForm" method="post" action="../checkout/checkout.php">';
            echo '<div class="container">
                        <table class="table">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">Thumbnail</th>
                                <th scope="col">Vehicle</th>
                                <th scope="col">Price Per Day</th>
                                <th scope="col">Rental Days</th>
                                <th scope="col">Actions</th>
                            </tr>
                            </thead>
                            <tbody>';

            foreach ($_SESSION["cart"] as $id => $item) {
                echo '<tr>';
                echo '<td class="align-middle" scope="row"><img style="width: 70px; height: 70px;" class="img-thumbnail" src="../../images/'.$item["Model"].'.jpg"></td>';
                echo '<td class="align-middle" class="align-middle">'.$item["Year"].'-'.$item["Brand"].'-'.$item["Model"].'</td>';
                echo '<td class="align-middle">'.$item["PricePerDay"].'</td>';
                echo '<td class="align-middle"><input name="rentalDays[]" type="number" required max="300" min="1" value="'.$item["RentalDays"].'" </td>';
                echo '<td class="align-middle"><button type="submit" onclick="document.getElementById(\'deleteId\').value=' . $id . '" class="btn btn-danger" form="deleteForm">Delete</button></td></tr>';
            }

            echo '</tbody></table>
            <div class="text-right">
                <button type="submit" form="checkoutForm" class="btn btn-primary">Processing to Checkout</button>
            </div></div></form>';

        }
        ?>



<form id="deleteForm" method="post" action="deleteCar.php">
    <input hidden name="id" id="deleteId" value="">
</form>



</body>
</html>