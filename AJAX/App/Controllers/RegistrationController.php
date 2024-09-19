<?php
require_once '../Models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $full_name = $_POST['full_name'];
    $student_id = $_POST['student_id'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        header("Location: ../Views/Auth/Registration.php?error=Passwords do not match");
        exit();
    }

    if (checkEmailExists($email)) {
        header("Location: ../Views/Auth/Registration.php?error=Email already exists");
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $result = registerUser($full_name, $student_id, $gender, $email, $hashed_password);

    if ($result) {
        header("Location: ../Views/Auth/Registration.php?success=Registration successful");
    } else {
        header("Location: ../Views/Auth/Registration.php?error=Registration failed");
    }
}
