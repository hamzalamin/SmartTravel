<?php
include '../../controllers/ReservationController.php';

$reservationController = new ReservationController();

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $result = $reservationController->removeReservationController($id);
        // Redirect to a success page or display a success message
        // header('Location: success_page.php'); // Redirect to a success page
        // exit();
    }
} else {
    // Handle the case where the ID is not provided
    echo "Reservation ID not provided.";
    exit(); // Add an exit to stop further execution
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Reservation</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Add custom styles -->
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container {
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 5px;
            margin-top: 50px;
        }
        h1 {
            color: #dc3545;
        }
        h3 {
            color: #6c757d;
        }
        button.btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        button.btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Delete Reservation</h1>
    <h3>Are you sure you want to delete this Reservation?</h3>
    
    <form method="post">
        <button type="submit" class="btn btn-danger">DELETE</button>
    </form>
    
    <a href="index.php" class="btn btn-secondary">Cancel</a>
</div>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
