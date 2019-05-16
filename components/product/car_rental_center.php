<html lang="en">
<head>
    <link rel="stylesheet" href="../../content/bootstrap.min.css">

    <script type="text/javascript" src="../js/ajax.js"></script>
    <script type="text/javascript">
        function checkAvailability(id) {
            if (ajax) {
                ajax.open('get','checkAvailability.php?id=' + id);
                ajax.onreadystatechange = function () {
                    if (this.readyState == 4 && this.status == 200) {
                        handleCheck(this);
                    }
                };
                ajax.send();
            }
        }
        
        function handleCheck(xml) {
            if (xml.responseText == "Y") {
                alert("Add car to shopping cart successfully");
            } else {
                alert("Sorry, the car is not available now. Please try other cars.");
            }
        }

    </script>
</head>
<body>
<div class="container mt-4">
<div class="card-deck" name="carList">

    <?php
    // retrieve xml database
    $xml = simplexml_load_file("../../database/cars.xml") or die("Error: Cannot create Object");

    // loop car list
    foreach ($xml->children() as $cars) {
        echo '<div class="card mb-4 w-25">';
        echo '<img src="../../images/' . $cars->Model . '.jpg" class="card-img-top" style="height: 120px;" alt="' . $cars->Model . '.jpg">';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">' . $cars->Brand . '-' . $cars->Model . '-' .  $cars->Year . '</h5>';
        echo '<ul class="list-group list-group-flush">';
        echo '<li class="list-group-item"><b>mileage: </b>' . $cars->Mileage . '</li>';
        echo '<li class="list-group-item"><b>fuel_type: </b>' . $cars->FuelType . '</li>';
        echo '<li class="list-group-item"><b>seats: </b>' . $cars->Seats . '</li>';
        echo '<li class="list-group-item"><b>price_per_day: </b>$'.$cars->PricePerDay.'</li>';
        echo '<li class="list-group-item"><b>availability: </b>'.$cars->Availability.'</li>';
        echo '<li class="list-group-item"><b>description: </b>'.$cars->Description.'</li></ul></div>';
        echo '<div class="card-body text-right">';
        echo '<a href="#" onclick="checkAvailability('.$cars->id.');" class="btn btn-primary">Add to Cart</a></div></div>';
    }
    ?>

</div>
</div>
</body>