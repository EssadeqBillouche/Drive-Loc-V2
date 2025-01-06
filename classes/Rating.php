<?php
namespace classes;

use PDO;

class Rating{
    public function addRating($carId, $userId,$reservationId ,$rating,$statu){
        $db = dbConnaction::getConnection();
        $stmt = $db->prepare('INSERT INTO rating (fk_car, fk_user,fk_reservation,RATING_NUMBER,satuts) VALUES (:carId, :userId, :reservationId,:rating,:statu)');
        $stmt->bindParam(':carId', $carId);
        $stmt->bindParam(':userId', $userId);
        $stmt->bindParam(':reservationId', $reservationId);
        $stmt->bindParam(':rating', $rating);
        $stmt->bindParam(':statu', $statu);
        $stmt->execute();
        header('Location: UserPage.php');
    }
    public function getRating($carId){
        $db = dbConnaction::getConnection();
        $stmt = $db->prepare("SELECT fk_car, COUNT(rating_id) AS rating_count, AVG(RATING_NUMBER) AS average_rating 
                      FROM rating 
                      WHERE satuts = 'active' 
                      GROUP BY fk_car;");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


}

?>