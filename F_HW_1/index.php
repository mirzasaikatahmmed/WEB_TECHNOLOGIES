<?php
session_start();

if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    header("Location: ./App/Views/Users/Dashboard.php");
} else {
    header("Location: ./App/Views/Authentication/Login.php");
}
exit();
?>