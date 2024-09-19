<?php
session_start();
require_once '../Models/UserModel.php';
require_once '../../Config/Database.php';

if (!isset($_SESSION['user_id'])) {
    echo 'User not logged in.';
    exit();
}

$userId = $_SESSION['user_id'];

$oldPassword = $_POST['old_password'] ?? '';
$newPassword = $_POST['new_password'] ?? '';
$confirmNewPassword = $_POST['confirm_new_password'] ?? '';

if (empty($oldPassword) || empty($newPassword) || empty($confirmNewPassword)) {
    echo 'All fields are required.';
    exit();
}

if ($newPassword !== $confirmNewPassword) {
    echo 'New passwords do not match.';
    exit();
}

$user = getUserById($userId);

if (!$user) {
    echo 'User not found.';
    exit();
}

if ($oldPassword !== $user['password']) {
    echo 'Old password is incorrect.';
    exit();
}

if (updateUserPassword($userId, $newPassword)) {
    echo 'Password changed successfully.';
} else {
    echo 'Failed to change password.';
}
?>
