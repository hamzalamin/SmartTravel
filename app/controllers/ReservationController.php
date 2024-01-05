<?php
include __DIR__ . '/../models/ReservationDAO.php';
include __DIR__ . '/../models/cityDao.php';
// include '../models/ReservationDAO.php';
class ReservationController {
    private $ReservationDAO;
    
    public function __construct(){
        $this->ReservationDAO = new ReservationDAO();
    }

    public function getReservations(){
        return $this->ReservationDAO->getAllreservations();
        // include '../views/ReservationView.php';
        // include __DIR__ . '/../views/reservationView.php';
    }
    public function addReservationController($id){
        return $this->ReservationDAO->addReservation($id);
        // include __DIR__ . '/../views/reservationView.php';
    }
    public function UpdateReservationController($id){
        return $this->ReservationDAO->UpdateReservation($id);
        // include __DIR__ . '/../views/reservationView.php';
    }
    public function removeReservationController($id){
        return $this->ReservationDAO->deleteReservation($id);
        // include __DIR__ . '/../views/reservationView.php';
    }
    
}
// Create an instance of ReservationController
// $reservationController = new ReservationController();

// // Call the getReservations method and store the result in $result
// $result = $reservationController->getReservations();

// // Print the result
// print_r($result);

?>