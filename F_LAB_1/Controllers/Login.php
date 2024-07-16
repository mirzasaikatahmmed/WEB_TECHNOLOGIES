<?php
session_start();
require_once '../Models/UsersModel.php';
require_once '../Models/ValidationCheckModel.php';

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = sanitize($_POST['email']);
    $password = sanitize($_POST['password']);
    $remember_me = isset($_POST['remember_me']);

    $_SESSION['email'] = "";
    $_SESSION['password'] = "";
    $_SESSION['emailErr'] = "";
    $_SESSION['passwordErr'] = "";
    $_SESSION['msg3'] = "";

    $validation_errors = validateLogin($email, $password);

    if (!empty($validation_errors)) {
        $_SESSION['emailErr'] = $validation_errors['email'] ?? "";
        $_SESSION['passwordErr'] = $validation_errors['password'] ?? "";
        header("Location: ../Views/Login.php");
        exit();
    } 

    else {
        $user = getUserByEmail($email);
        if ($user && $password === $user['password'] && $user['status'] == 1) {
            $_SESSION['user'] = $user;
            $_SESSION['msg3'] = "Login successful!";
            if ($remember_me) {
                date_default_timezone_set('Asia/Dhaka');
                setcookie('email', $email, time() + (86400 * 30), "/");
                setcookie('password', $password, time() + (86400 * 30), "/");
            }

            else {
                date_default_timezone_set('Asia/Dhaka');
                setcookie('email', $email, time() + (5 * 60), '/');
                setcookie('password', $password, time() + (5 * 60), '/');
            }

            header("Location: ../Views/Dashboard.php");
            exit();
        } 

        else {
            $_SESSION['msg3'] = "Invalid email or password or your account is inactive.";
            header("Location: ../Views/Login.php");
            exit();
        }
    }
} 

else {
    header("Location: ../Views/Login.php");
    exit();
}

function validateLogin($email, $password) {
    $errors = [];

    if (empty($email)) {
        $errors['email'] = "Email is required.";
    } 
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Invalid email format.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } 
    
    if (strlen($password) < 8) {
        $errors['password'] = "Password must be at least 8 characters long.";
    } 
    
    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[\W]/', $password)) {
        $errors['password'] = "Password must be strong (include upper and lower case letters, numbers, and special characters).";
    }

    return $errors;
}

?>
