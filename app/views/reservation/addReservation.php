<?php
include '../../controllers/ReservationController.php';
$id = isset($_POST['id']) ? $_POST['id'] : null;
$reservationController = new ReservationController();
$result = $reservationController->addReservationController($id);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Reservation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
</head>
<body>

<h1>Add Reservation</h1>
<form action="">
    <label for="">Reservation Date</label>
    <input type="date">
    <label for="">Seats Number</label>
    <input type="number">
    <div class="mb-3">
        <label for="startCity" class="form-label">Start City</label>
        <!-- Dropdown for start city selection -->
        <select id="citySelect" onchange="updateDestinationCities()">
            <!-- City options will be populated dynamically -->
        </select>
    </div>

    <div class="mb-3">
        <label for="endCity" class="form-label">End City</label>
        <!-- Dropdown for end city selection -->
        <select id="endCitySelect">
            <!-- City options will be populated dynamically -->
        </select>
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 w-full">Submit</button>

</form>





<script>
     var config = {
    cUrl: 'https://api.countrystatecity.in/v1/countries',
    ckey: 'NHhvOEcyWk50N2Vna3VFTE00bFp3MjFKR0ZEOUhkZlg4RTk1MlJlaA=='
}

var startCitySelect = document.getElementById('citySelect');
var endCitySelect = document.getElementById('endCitySelect');

function loadMoroccanCities(selectElement) {
    const moroccoCountryCode = 'MA'; 

    fetch(`${config.cUrl}/${moroccoCountryCode}/cities`, { headers: { "X-CSCAPI-KEY": config.ckey } })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            data.forEach(city => {
                const option = document.createElement('option');
                option.value = city.iso2;
                option.textContent = city.name;
                selectElement.appendChild(option);
            });
        })
        .catch(error => {
            console.error('Fetch error:', error);
        });
}

window.onload = function() {
    loadMoroccanCities(startCitySelect);
    loadMoroccanCities(endCitySelect);
};

    </script>

    <script>
        function updateDestinationCities() {
            var departureCity = document.getElementById("citySelect");
            var destinationCity = document.getElementById("endCitySelect");

            // Clear existing options in destinationCity
            destinationCity.innerHTML = "";

            // Clone all options from departureCity to destinationCity
            for (var i = 0; i < departureCity.options.length; i++) {
                destinationCity.options.add(departureCity.options[i].cloneNode(true));
            }

            // Remove the selected option in destinationCity
            for (var i = 0; i < destinationCity.options.length; i++) {
                if (destinationCity.options[i].value === departureCity.value) {
                    destinationCity.remove(i);
                    break;
                }
            }
        }
    </script>
</body>
</html>