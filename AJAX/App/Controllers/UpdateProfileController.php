<?php
session_start();
require_once '../Models/UserModel.php';

if (!isset($_SESSION['user_id'])) {
    echo 'You need to log in first.';
    exit();
}

$userId = $_SESSION['user_id'];

$fullName = isset($_POST['full_name']) ? trim($_POST['full_name']) : '';
$studentId = isset($_POST['student_id']) ? trim($_POST['student_id']) : '';
$gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

$errors = [];

if (empty($fullName)) {
    $errors[] = 'Full Name is required.';
}

if (empty($studentId)) {
    $errors[] = 'Student ID is required.';
}

if (empty($gender)) {
    $errors[] = 'Gender is required.';
}

if (!empty($errors)) {
    echo implode('<br>', $errors);
    exit();
}

$updateSuccess = updateUserProfile($userId, $fullName, $studentId, $gender);

if ($updateSuccess) {
    echo 'Profile updated successfully.';
} else {
    echo 'Failed to update profile. Please try again.';
}
?>
