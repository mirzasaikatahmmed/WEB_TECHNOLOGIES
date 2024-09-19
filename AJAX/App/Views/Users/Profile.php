<?php
include_once '../Layouts/Header.php';
require_once '../../Models/UserModel.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../Auth/login.php');
    exit();
}

$userId = $_SESSION['user_id'];
$user = getUserById($userId);
?>
    <div class="profile-container">
        <h2>Profile Information</h2>
        <div class="profile-info">
            <div class="info-group">
                <label>Full Name:</label>
                <span><?php echo htmlspecialchars($user['name']); ?></span>
            </div>

            <div class="info-group">
                <label>Student ID:</label>
                <span><?php echo htmlspecialchars($user['student_id']); ?></span>
            </div>

            <div class="info-group">
                <label>Gender:</label>
                <span><?php echo htmlspecialchars($user['gender']); ?></span>
            </div>

            <div class="info-group">
                <label>Email:</label>
                <span><?php echo htmlspecialchars($user['email']); ?></span>
            </div>
        </div>
        <div class="update-profile">
            <a href="UpdateProfile.php" class="btn">Update Profile</a>
        </div>
    </div>
<?PHP include_once '../Layouts/Footer.php'; ?>
