<?php

namespace classes;
use PDO;

class dbConnaction {
    private $db = 'carrent';
    private $host = 'localhost';
    private $username = 'root';
    private $password = '';
    private static $connection = null;

    private function __construct() {
        try {
            self::$connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->username, $this->password);
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Connection failed: ' . $e->getMessage());
        }
    }

    public static function getConnection() {
        if (self::$connection === null) {
            new self();
        }
        return self::$connection;
    }
}
?>
