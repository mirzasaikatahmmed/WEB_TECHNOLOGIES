<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adding Droping Courses</title>
    <link rel="stylesheet" href="../../../Public/Assets/CSS/style.css">
    <script src="../../../Public/Assets/JS/Script.js" defer></script>
</head>
<body>
<div class="registration-container">
    <form id="registrationForm" action="../../Controllers/RegistrationController.php" method="POST" novalidate>
        <h2>Register</h2>

        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message-global">
                <?php echo htmlspecialchars($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['success'])): ?>
            <div class="success-message-global">
                <?php echo htmlspecialchars($_SESSION['success']); ?>
            </div>
        <?php endif; ?>

        <div class="input-group">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" placeholder="Enter your full name" value="<?php echo empty($_SESSION['full_name']) ? "" : $_SESSION['full_name']; ?>">
            <div id="name-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="student_id">Student ID</label>
            <input type="text" id="student_id" name="student_id" placeholder="Enter your student ID" value="<?php echo empty($_SESSION['student_id']) ? "" : $_SESSION['student_id']; ?>">
            <div id="student_id-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="gender">Gender</label>
            <select id="gender" name="gender">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
            <div id="gender-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo empty($_SESSION['email']) ? "" : $_SESSION['email']; ?>">
            <div id="email-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" value="<?php echo empty($_SESSION['password']) ? "" : $_SESSION['password']; ?>">
            <div id="password-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" value="<?php echo empty($_SESSION['confirm_password']) ? "" : $_SESSION['confirm_password']; ?>">
            <div id="confirm-password-error" class="error-message"></div>
        </div>

        <div class="input-group">
            <label for="Photo">Photo</label>
            <input type="file" id="photo" name="photo" accept="image/*">
            <div id="photo-error" class="error-message"></div>
        </div>

        <button type="submit">Register</button>
    </form>

    <div class="login-link">
        <p>Already have an account? <a href="./Login.php">Login here</a></p>
    </div>
</div>

</body>
</html>
