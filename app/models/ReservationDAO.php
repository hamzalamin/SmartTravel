<?php
include_once 'DatabaseDAO.php';
include 'Reservation.php';


class ReservationDAO extends DatabaseDAO {
    public function getAllreservations(){
        $query = "SELECT * FROM reservation";
        // var_dump($query);
        
        // $stmt = $DatabaseDAO->prepare($query);
        $ReservationData = $this->fetchAll($query);

        $reservations = array();
        foreach($ReservationData as $oneReservation) {
            $reservations[] = new Reservation($oneReservation['reservationID'], $oneReservation['travelID'], $oneReservation['userID'], $oneReservation['seatNumber'], $oneReservation['reservationDate']);
        }
        return $reservations;
        
    }
    

    public function addReservation($id){
        // hadi dertha bach ntcheki lid khass ikoun null 9bel manccsesi lih
        if ($id !== null) {
            $query = "INSERT INTO Reservation VALUES (" . $id->getTravelID() . "," . $id->getUserID() . "," . $id->getSeatNumber() . ",'" . $id->getReservationDate() . "')";
            $this->execute($query);
        } else {
            // safe hadi ghir kat3tini error log ila kan id null 
            error_log("Trying to addReservation with a null ID");
        }
    }
    public function UpdateReservation($id){
        $query = "UPDATE Reservation SET travelID = ". $id->getTravelID()." , userID = ". $id->getUserID().",  seatNumber = ". $id->getSeatNumber(). "reservationDate = ". $id->getReservationDate()." WHERE reservationID = ". $id->getReservationID(). "";
        $this->execute($query);
    }

    public function deleteReservation($id) {
        $id = (int) $id;    
        $query = "DELETE FROM reservation WHERE reservationID = " . $id;
        $this->execute($query);
    }
    

}
//     $curl = curl_init();
//     curl_setopt($curl, CURLOPT_URL, 'https://parseapi.back4app.com/classes/CitiesMorocco_List_of_Morroco_cities?limit=10&keys=asciiname');
//     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
//         'X-Parse-Application-Id: AnyMBSaYqp1ZsNrb8GQ1ISGFDwu2cMXGn2LhGk7E', // This is your app's application id
//         'X-Parse-REST-API-Key: whu5T4O98wkSj5wQMslHmy9fC4zzNVnZzl2IQwhv' // This is your app's REST API key
//     ));
//     $data = json_decode(curl_exec($curl)); // Here you have the data that you need
//     print_r(json_encode($data, JSON_PRETTY_PRINT));
//     curl_close($curl);
// 
?> 
 

