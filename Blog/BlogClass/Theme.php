<?php

namespace BlogClass;

use classes\dbConnaction;
use Exception;
use PDO;

class Theme
{
    private $dbConnection;

    public function __construct()
    {
        $this->dbConnection = dbConnaction::getConnection();
    }

    public function createTheme($name, $description)
    {
        try {
            $stmt = $this->dbConnection->prepare("
                INSERT INTO themes (name, description) 
                VALUES (:name, :description)
            ");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            error_log("Error in createTheme: " . $e->getMessage());
            return false;
        }
    }

    public function updateTheme($id, $name, $description)
    {
        try {
            $stmt = $this->dbConnection->prepare("
                UPDATE themes 
                SET name = :name, description = :description 
                WHERE id = :id
            ");
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':description', $description);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            error_log("Error in updateTheme: " . $e->getMessage());
            return false;
        }
    }

    public function deleteTheme($id)
    {
        try {
            $stmt = $this->dbConnection->prepare("
                DELETE FROM themes 
                WHERE id = :id
            ");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return true;
        } catch (Exception $e) {
            error_log("Error in deleteTheme: " . $e->getMessage());
            return false;
        }
    }

    public function getThemeById($id)
    {
        try {
            $stmt = $this->dbConnection->prepare("
                SELECT * 
                FROM themes 
                WHERE id = :id
            ");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error in getThemeById: " . $e->getMessage());
            return null;
        }
    }

    public function getAllThemes()
    {
        try {
            $stmt = $this->dbConnection->prepare("
                SELECT * 
                FROM themes
            ");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error in getAllThemes: " . $e->getMessage());
            return [];
        }
    }
}
