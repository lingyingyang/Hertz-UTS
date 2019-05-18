<html lang="en">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
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

        $(document).ready(function () {
            $("#searchInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $("#searchDIV div").filter(function() {
                    $(this).toggle($(this).find(".card-title").text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

    </script>
</head>
<body>
<div class="container">
    <input type="text" class="form-control" id="searchInput" placeholder="Search..">
<div id="searchDIV" class="row mt-3">

    <?php
    // retrieve xml database
    $xml = simplexml_load_file("../../database/cars.xml") or die("Error: Cannot create Object");

    // loop car list
    foreach ($xml->children() as $cars) {
        echo '<div class="col-md-3 mb-3">';
        echo '<div class="card">';
        echo '<img src="../../images/' . $cars->Model . '.jpg" class="card-img-top img-fluid" style="height: 200px;" alt="' . $cars->Model . '.jpg">';
        echo '<div class="card-body" style="padding-top: 0px; padding-bottom: 0px;">';
        echo '<h5 class="card-title">' . $cars->Brand . '-' . $cars->Model . '-' .  $cars->Year . '</h5>';
        echo '<ul class="list-unstyled">';
        echo '<li class="card-text"><b>mileage: </b>' . $cars->Mileage . '</li>';
        echo '<li class="card-text"><b>fuel_type: </b>' . $cars->FuelType . '</li>';
        echo '<li class="card-text"><b>seats: </b>' . $cars->Seats . '</li>';
        echo '<li class="card-text"><b>price_per_day: </b>$'.$cars->PricePerDay.'</li>';
        echo '<li class="card-text"><b>availability: </b>'.$cars->Availability.'</li>';
        echo '<li class="card-text"><b>description: </b>'.$cars->Description.'</li></ul></div>';
        echo '<a href="#" onclick="checkAvailability('.$cars->id.');" class="btn btn-primary">Add to Cart</a></div></div>';
    }
    ?>

</div>
</div>
</body>