<?php include_once '../Layouts/header.php'; ?>

<div class="ChangePassword-Form">
    <form id="changePasswordForm" method="POST" action="../../Controllers/PChangePasswordController.php" novalidate>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?php echo empty($_SESSION['email']) ? "" :  $_SESSION['email'] ?>" readonly>

        <label for="currentPassword">Current Password</label>
        <input type="password" id="currentPassword" name="currentPassword">
        <span id="errCurrentPassword"><?php echo empty($_SESSION['errCurrentPassword']) ? "" : $_SESSION['errCurrentPassword'] ?></span>
        
        <label for="newPassword">New Password</label>
        <input type="password" id="newPassword" name="newPassword" value="<?php echo empty($_SESSION['newPassword']) ? "" :  $_SESSION['newPassword'] ?>">
        <span id="errNewPassword"><?php echo empty($_SESSION['errNewPassword']) ? "" :  $_SESSION['errNewPassword'] ?></span>

        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword">
        <span id="errConfirmPassword"><?php echo empty($_SESSION['err2']) ? "" :  $_SESSION['err2'] ?></span>

        <span id="errGeneral"><?php echo empty($_SESSION['err3']) ? "" :  $_SESSION['err3'] ?></span>
        <br><br>

        <button type="submit">Change Password</button>
    </form>
</div>

<script>
document.getElementById('changePasswordForm').addEventListener('submit', function(event) {
    let valid = true;
    let currentPassword = document.getElementById('currentPassword').value;
    let newPassword = document.getElementById('newPassword').value;
    let confirmPassword = document.getElementById('confirmPassword').value;

    document.getElementById('errCurrentPassword').textContent = '';
    document.getElementById('errNewPassword').textContent = '';
    document.getElementById('errConfirmPassword').textContent = '';
    document.getElementById('errGeneral').textContent = '';

    if (currentPassword === '') {
        document.getElementById('errCurrentPassword').textContent = 'Current Password is required.';
        valid = false;
    }

    if (newPassword === '') {
        document.getElementById('errNewPassword').textContent = 'New Password is required.';
        valid = false;
    }

    if (confirmPassword === '') {
        document.getElementById('errConfirmPassword').textContent = 'Confirm Password is required.';
        valid = false;
    }

    if (newPassword !== confirmPassword) {
        document.getElementById('errGeneral').textContent = 'New Password and Confirm Password do not match.';
        valid = false;
    }

    if (!valid) {
        event.preventDefault();
    }
});
</script>

<?php include_once '../Layouts/footer.php'; ?>