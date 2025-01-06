<?php
namespace classes;

use PDO;
use PDOException;

class reservation{

    private $id;
    private $userId;
    private $CarID;
    private $reservationName;
    private $email;
    private $startDate;
    private $endDate;
    private $status;
    private $pickupLocation;
    private $dropLocation;
    private $pickupDate;
    private $dropDate;


    public function allResevations()
    {
        $db = dbConnaction::getConnection();
        $query = $db->query("SELECT statu,reservation_id,user_name, car_brand, pickup_location, drop_location, pickup_date, drop_date FROM reservation INNER JOIN users ON users.user_id = reservation.user_fk INNER JOIN car ON car.car_id = reservation.car_fk");
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function addReservation($carId, $userId, $pickupLocation, $dropLocation, $pickupDate, $dropDate) {
        try {
            $db = dbConnaction::getConnection();
            $query = $db->prepare("CALL AddReservation(:carId, :userId, :pickupLocation, :dropLocation, :pickupDate, :dropDate)");
            $query->bindParam(":carId", $carId);
            $query->bindParam(":userId", $userId);
            $query->bindParam(":pickupLocation", $pickupLocation);
            $query->bindParam(":dropLocation", $dropLocation);
            $query->bindParam(":pickupDate", $pickupDate);
            $query->bindParam(":dropDate", $dropDate);
            $query->execute();
            return true;
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function changeStatus($status, $reservationId) {
        $db = dbConnaction::getConnection();
        $query = $db->prepare("UPDATE reservation SET statu = :status WHERE reservation_id = :reservationId");
        $query->bindParam(":status", $status);
        $query->bindParam(":reservationId", $reservationId);
        $query->execute();
    }

    public function reservationByUserId($userId) {
        $db = dbConnaction::getConnection();
        $query = $db->prepare("SELECT * FROM reservation WHERE user_fk = :userId");
        $query->bindParam(":userId", $userId);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function deleteReservation($id){
        $db = dbConnaction::getConnection();
        $query = $db->prepare("DELETE FROM reservation WHERE id = :id;");
        $query->bindParam(":id", $id);
        $query->execute();

    }

    public static function reservationCount(){
        $db = dbConnaction::getConnection();
        $query = $db->query("SELECT COUNT(*) as result FROM reservation");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result["result"];

    }
}




?>