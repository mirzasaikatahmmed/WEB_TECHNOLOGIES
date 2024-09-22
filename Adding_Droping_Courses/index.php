<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: ./App/Views/Auth/login.php');
    exit();
} else {
    header('Location: ./App/Views/Dashboard/Home.php');
    exit();
}
?>