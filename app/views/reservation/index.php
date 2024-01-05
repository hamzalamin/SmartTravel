<?php
include '../../controllers/ReservationController.php';


$reservationController = new ReservationController();
$result = $reservationController->getReservations();
// print_r($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Reservation List</h2>

    <table class="table">
        <thead>
        <tr>
            <th>Reservation Date</th>
            <th>Seats Number</th>
            <th>User Id</th>
            <th>Travel Id</th>
            <th>Reservation Id</th>
            <th>ACTION</th>
        </tr>
        </thead>
        <tbody>
        <div class="mt-5">
        <button type="button" class="btn btn-success">Add</button>
        </div>
        <?php foreach ($result as $oneResult) { ?>
            <tr>
                <td><?php echo $oneResult->getReservationDate(); ?></td>
                <td><?php echo $oneResult->getSeatNumber(); ?></td>
                <td><?php echo $oneResult->getUserID(); ?></td>
                <td><?php echo $oneResult->getTravelID(); ?></td>
                <td><?php echo $oneResult->getReservationID(); ?></td>
                <td>
                    <!-- <button type="button" class="btn btn-primary">UPDATE</button> -->
                    <a href="DeleteReservation.php?id=<?php echo $oneResult->getReservationID(); ?>">
                        <button type="button" class="btn btn-danger">DELETE</button>
                    </a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    
</div>

<!-- Include Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>
