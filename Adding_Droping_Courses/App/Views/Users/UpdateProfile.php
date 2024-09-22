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

    <div class="update-profile-container">
        <h2>Update Profile</h2>
        <form id="updateProfileForm">
            <div class="input-group">
                <label for="full_name">Full Name</label>
                <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($user['name']); ?>">
                <div id="name-error" class="error-message"></div>
            </div>

            <div class="input-group">
                <label for="student_id">Student ID</label>
                <input type="text" id="student_id" name="student_id" value="<?php echo htmlspecialchars($user['student_id']); ?>">
                <div id="student_id-error" class="error-message"></div>
            </div>

            <div class="input-group">
                <label for="gender">Gender</label>
                <select id="gender" name="gender" required>
                    <option value="">Select Gender</option>
                    <option value="Male" <?php echo $user['gender'] === 'Male' ? 'selected' : ''; ?>>Male</option>
                    <option value="Female" <?php echo $user['gender'] === 'Female' ? 'selected' : ''; ?>>Female</option>
                </select>
                <div id="gender-error" class="error-message"></div>
            </div>

            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" readonly>
                <div id="email-error" class="error-message"></div>
            </div>

            <button type="submit">Update</button>
        </form>
        <div id="update-status" class="status-message"></div>
    </div>

<?php include_once '../Layouts/Footer.php'; ?>
