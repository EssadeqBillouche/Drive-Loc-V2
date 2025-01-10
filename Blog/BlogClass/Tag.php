<?php

namespace BlogClass;

use classes\dbConnaction;
use Exception;
use PDO;

class Tag
{
    private $dbConnection;
    private $tagName;

    public function __construct($tagName)
    {
        $this->dbConnection = dbConnaction::getConnection();
        $this->tagName = $tagName;
    }

    public function addTag($tagName)
    {
        try {
                $stmt = $this->dbConnection->prepare("INSERT INTO tags (name) VALUES (:tagName)");
                $stmt->bindParam(':tagName', $tagName);
                $stmt->execute();
                return true;
        } catch (Exception $e) {
            error_log("Error in addTag: " . $e->getMessage());
            return false;
        }
    }

    public function checkIfTagExists($tagName)
    {
        try {
            $stmt = $this->dbConnection->prepare("SELECT * FROM tags WHERE name = :tagName LIMIT 1");
            $stmt->bindValue(':tagName', $tagName);
            $stmt->execute();
            return $stmt->rowCount() > 0;
        } catch (Exception $e) {
            error_log("Error in checkIfTagExists: " . $e->getMessage());
            return false;
        }
    }

    public function deleteTag($tagName)
    {
        try {
                $stmt = $this->dbConnection->prepare("DELETE FROM tags WHERE name = :tagName");
                $stmt->bindParam(':tagName', $tagName);
                $stmt->execute();
        } catch (Exception $e) {
            error_log("Error in deleteTag: " . $e->getMessage());
            return false;
        }
    }

    public static function displayTags()
    {
        try {
            $db = dbConnaction::getConnection();
            $stmt = $db->prepare("SELECT * FROM tags");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error in displayTags: " . $e->getMessage());
            return [];
        }
    }
}
