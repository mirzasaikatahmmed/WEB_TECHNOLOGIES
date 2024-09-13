<?php include_once '../Layouts/header.php'; ?>

<div class="registration-form">
    <h2>Registration</h2>
    <form method="POST" action="../../Controllers/RegistrationController.php" novalidate>
        <label for="name">Full Name: </label>
        <input type="text" name="name" id="name" value="<?php echo empty($_SESSION['name']) ? "" : $_SESSION['name']; ?>" placeholder="Enter your Full Name">
        <span class="error"><?php echo empty($_SESSION['nameErr']) ? "" : $_SESSION['nameErr']; ?></span>

        <label for="student_id">Student ID: </label>
        <input type="text" name="student_id" id="student_id" value="<?php echo empty($_SESSION['student_id']) ? "" : $_SESSION['student_id']; ?>" placeholder="Enter your Student ID">
        <span class="error"><?php echo empty($_SESSION['student_idErr']) ? "" : $_SESSION['student_idErr']; ?></span>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?php echo empty($_SESSION['email']) ? "" : $_SESSION['email']; ?>" placeholder="Enter your email">
        <span class="error"><?php echo empty($_SESSION['emailErr']) ? "" : $_SESSION['emailErr']; ?></span>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" value="<?php echo empty($_SESSION['password']) ? "" : $_SESSION['password']; ?>" placeholder="Enter your password">
        <span class="error"><?php echo empty($_SESSION['passwordErr']) ? "" : $_SESSION['passwordErr']; ?></span>
        <br>
        <button id="submit">Register</button>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </form>
</div>

<?php include_once '../Layouts/footer.php'; ?>
