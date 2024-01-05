<?php

class Reservation {
    private $reservationID;
    private $travelID;
    private $userID;
    private $seatNumber;
    private $reservationDate;


    public function __construct($reservationID, $travelID, $userID, $seatNumber, $reservationDate)
    {
        $this->reservationID = $reservationID;
        $this->travelID = $travelID;
        $this->userID = $userID;
        $this->seatNumber = $seatNumber;
        $this->reservationDate = $reservationDate;
    }

    public function getReservationID(){
        return $this->reservationID;
    }

    public function getTravelID(){
        return $this->travelID;
    }

    public function getUserID(){
        return $this->userID;
    }

    public function getSeatNumber(){
        return $this->seatNumber;
    }

    public function getReservationDate(){
        return $this->reservationDate;
    }
}




?>