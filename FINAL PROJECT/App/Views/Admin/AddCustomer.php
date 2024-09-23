<?PHP
include_once '../Layouts/Header.php';
?>

<div class="form-container">
        <h1>Add New Customer</h1>
        <form action="../../Controllers/CustomerController.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Full Name:</label>
                <input type="text" id="name" name="name" placeholder="Enter your full name" value="<?php echo empty($_SESSION['name']) ? "" : $_SESSION['name']; ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" id="email" name="email" placeholder="Enter your email" value="<?php echo empty($_SESSION['email']) ? "" : $_SESSION['email']; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Create a password" required>
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password:</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your password" required>
            </div>
            <div class="form-group">
                <label for="profile_image">Profile Image:</label>
                <input type="file" id="profile_image" name="profile_image" accept="image/*">
            </div>
            <div class="form-group">
                <button type="submit" class="btn-submit">Add Customer</button>
            </div>
        </form>
    </div>

<?PHP include_once '../Layouts/Footer.php'; ?>