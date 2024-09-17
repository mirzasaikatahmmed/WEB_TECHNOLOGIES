<?php include_once '../Layouts/header.php'; ?>

<div class="registration-form">
    <h2>Registration</h2>
    <form id="registrationForm" method="POST" action="../../Controllers/RegistrationController.php" novalidate>
        <label for="name">Full Name: </label>
        <input type="text" name="name" id="name" value="<?php echo empty($_SESSION['name']) ? "" : $_SESSION['name']; ?>" placeholder="Enter your Full Name">
        <span class="error" id="nameErr"><?php echo empty($_SESSION['nameErr']) ? "" : $_SESSION['nameErr']; ?></span>

        <label for="student_id">Student ID: </label>
        <input type="text" name="student_id" id="student_id" value="<?php echo empty($_SESSION['student_id']) ? "" : $_SESSION['student_id']; ?>" placeholder="Enter your Student ID">
        <span class="error" id="student_idErr"><?php echo empty($_SESSION['student_idErr']) ? "" : $_SESSION['student_idErr']; ?></span>
        
        <label for="gender">Gender: </label>
        <input type="radio" name="gender" id="male" value="male" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'male') ? 'checked' : ''; ?>> Male
        <input type="radio" name="gender" id="female" value="female" <?php echo (isset($_SESSION['gender']) && $_SESSION['gender'] == 'female') ? 'checked' : ''; ?>> Female
        <span class="error" id="genderErr"><?php echo empty($_SESSION['genderErr']) ? "" : $_SESSION['genderErr']; ?></span>
        <br><br>

        <label for="email">Email: </label>
        <input type="email" name="email" id="email" value="<?php echo empty($_SESSION['email']) ? "" : $_SESSION['email']; ?>" placeholder="Enter your email">
        <span class="error" id="emailErr"><?php echo empty($_SESSION['emailErr']) ? "" : $_SESSION['emailErr']; ?></span>

        <label for="password">Password: </label>
        <input type="password" name="password" id="password" value="<?php echo empty($_SESSION['password']) ? "" : $_SESSION['password']; ?>" placeholder="Enter your password">
        <span class="error" id="passwordErr"><?php echo empty($_SESSION['passwordErr']) ? "" : $_SESSION['passwordErr']; ?></span>
        
        <label for="cpassword">Confirm Password: </label>
        <input type="password" name="cpassword" id="cpassword" value="<?php echo empty($_SESSION['cpassword']) ? "" : $_SESSION['cpassword']; ?>" placeholder="Enter your confirm password">
        <span class="error" id="cpasswordErr"><?php echo empty($_SESSION['cpasswordErr']) ? "" : $_SESSION['cpasswordErr']; ?></span>
        <br>
        <button id="submit" type="submit">Register</button>

        <?php if (isset($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
    </form>
</div>

<script>
document.getElementById('registrationForm').addEventListener('submit', function(event) {
    let isValid = true;

    document.querySelectorAll('.error').forEach(function(el) {
        el.textContent = '';
    });

    const name = document.getElementById('name').value;
    if (name.trim() === '') {
        document.getElementById('nameErr').textContent = 'Full Name is required';
        isValid = false;
    }

    const studentId = document.getElementById('student_id').value;
    const studentIdPattern = /^(00|01|02|03|04|05|06|07|08|09|10|11|12|14|15|16|17|18|19|20|21|22|23|24)-\d{5}-[1-3]$/;
    if (studentId.trim() === '') {
        document.getElementById('student_idErr').textContent = 'Student ID is required';
        isValid = false;
    } else if (!studentIdPattern.test(studentId)) {
        document.getElementById('student_idErr').textContent = 'Invalid Student ID format';
        isValid = false;
    }

    const gender = document.querySelector('input[name="gender"]:checked');
    if (!gender) {
        document.getElementById('genderErr').textContent = 'Gender is required';
        isValid = false;
    }

    const email = document.getElementById('email').value;
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email.trim() === '') {
        document.getElementById('emailErr').textContent = 'Email is required';
        isValid = false;
    } else if (!emailPattern.test(email)) {
        document.getElementById('emailErr').textContent = 'Invalid email format';
        isValid = false;
    }

    const password = document.getElementById('password').value;
    if (password.trim() === '') {
        document.getElementById('passwordErr').textContent = 'Password is required';
        isValid = false;
    }

    const cpassword = document.getElementById('cpassword').value;
    if (cpassword.trim() === '') {
        document.getElementById('cpasswordErr').textContent = 'Confirm Password is required';
        isValid = false;
    } else if (password !== cpassword) {
        document.getElementById('cpasswordErr').textContent = 'Passwords do not match';
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});
</script>

<?php include_once '../Layouts/footer.php'; ?>
