<?php 
    include_once '../Layouts/Header.php';
    require_once '../../Models/User.php';
    
    if (isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
        $user = getUserDataById($user_id); 
    } else {
        $user = null;
    }
?>
<div class="profile-container">
    <div class="profile-header">
        <h1>Your Profile</h1>
    </div>
    
    <div class="profile-details">
        <?php if ($user): ?>
            <?php if ($user['role'] === 'admin'): ?>
                <div class="profile-info">
                    <h2><?php echo $user['name']; ?></h2>
                    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                </div>
            <?php elseif ($user['role'] === 'customer'): ?>
                <div class="profile-image">
                    <?php if (isset($user['profile_image'])): ?>
                        <img src="<?php echo $user['profile_image']; ?>" alt="Profile Image">
                    <?php else: ?>
                        <img src="default_profile_image.jpg" alt="Default Profile Image">
                    <?php endif; ?>
                </div>
                
                <div class="profile-info">
                    <h2><?php echo $user['name']; ?></h2>
                    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
                    <p><strong>Contact Number:</strong> <?php echo $user['contact_number']; ?></p>
                    <p><strong>Shipping Address:</strong> <?php echo $user['shipping_address']; ?></p>
                </div>
            <?php endif; ?>
        <?php else: ?>
            <p>User data not available.</p>
        <?php endif; ?>
    </div>
    
    <div class="profile-actions">
        <a href="./EditProfile.php" class="btn-edit">Edit Profile</a>
        <!-- <a href="logout.php" class="btn-logout">Logout</a> -->
    </div>
</div>
<?php require_once '../Layouts/Footer.php'; ?>