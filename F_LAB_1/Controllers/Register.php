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

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = sanitize($_POST['email']);
    $password = $_POST['password'];
    $cpassword = $_POST['cPassword'];

    $_SESSION['email'] = $email;

    $_SESSION['emailErr'] = '';
    $_SESSION['passwordErr'] = '';
    $_SESSION['cPasswordErr'] = '';
    $_SESSION['registrationErr'] = '';

    $flag = true;
    $errorMessages = [];

    if (empty($email)) {
        $flag = false;
        $errorMessages['emailErr'] = "Please provide the email";
    } 
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $flag = false;
        $errorMessages['emailErr'] = "Invalid email format";
    }

    if (empty($password)) {
        $flag = false;
        $errorMessages['passwordErr'] = "Please provide the password";
    } 
    
    if (strlen($password) < 8) {
        $flag = false;
        $errorMessages['passwordErr'] = "Password must be at least 8 characters long";
    } 
    
    if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password) || !preg_match('/[\W]/', $password)) {
        $flag = false;
        $errorMessages['passwordErr'] = "Password must contain at least one uppercase letter, one lowercase letter, one digit, and one special character";
    }

    if ($password !== $cpassword) {
        $flag = false;
        $errorMessages['cPasswordErr'] = "Passwords do not match";
    }

    if ($flag === true) {
        if (!isEmailUnique($email)) {
            $_SESSION['emailErr'] = "Email is already registered.";
            header("Location: ../Views/Registration.php");
            exit();
        }

        $registration_result = addUser($email, $password);

        if ($registration_result['success']) {
            $_SESSION['registrationSuccess'] = "Registration Successful. Please login.";
            header("Location: ../Views/Login.php");
            exit();
        } 
        
        else {
            $_SESSION['registrationErr'] = $registration_result['message'];
            header("Location: ../Views/Registration.php");
            exit();
        }
    } 
    
    else {
        foreach ($errorMessages as $key => $message) {
            $_SESSION[$key] = $message;
        }
        
        header("Location: ../Views/Registration.php");
        exit();
    }
} 

else {
    header("Location: ../Views/Registration.php");
    exit();
}
?>
