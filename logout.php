<?php
require_once 'classes/Autoloader.php';
use classes\Autoloader;

Autoloader::AutoloaderFunction();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Logoutbtn'])) {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    session_unset();
    session_destroy();
    header('Location: login.php');
    exit();
}
?>
