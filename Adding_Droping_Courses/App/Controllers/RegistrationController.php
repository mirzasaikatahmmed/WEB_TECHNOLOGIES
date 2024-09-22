<?php
session_start();
require_once '../Models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $student_id = $_POST['student_id'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        $_SESSION['error'] = 'Passwords do not match';
        header("Location: ../Views/Auth/Registration.php");
        exit();
    }

    if (checkEmailExists($email)) {
        $_SESSION['error'] = 'Email already exists';
        header("Location: ../Views/Auth/Registration.php");
        exit();
    }

    $result = registerUser($full_name, $student_id, $gender, $email, $password);

    if ($result) {
        $_SESSION['success'] = 'Registration successful';
    } else {
        $_SESSION['error'] = 'Registration failed';
    }

    header("Location: ../Views/Auth/Registration.php");
    exit();
}
