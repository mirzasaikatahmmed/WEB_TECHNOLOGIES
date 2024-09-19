<?php
session_start();
require_once '../Models/UserModel.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $error_message = 'Please fill in all fields.';
    } else {
        $user = getUserByEmail($email);

        if ($user && $password === $user['password']) {
            $_SESSION['user_id'] = $user['id'];
            header("Location: ../Views/Users/Profile.php");
            exit();
        } else {
            $error_message = 'Invalid email or password.';
        }
    }

    if (!empty($error_message)) {
        header("Location: ../Views/Auth/Login.php?error=" . urlencode($error_message));
        exit();
    }
} else {
    header("Location: ../Views/Auth/Login.php?error=" . urlencode('Please log in to continue.'));
    exit();
}
