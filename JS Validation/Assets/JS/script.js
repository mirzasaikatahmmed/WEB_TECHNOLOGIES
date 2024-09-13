function isValid(form) {
    let email = form.email.value.trim();
    let password = form.password.value.trim();
    let isValid = true;

    document.querySelectorAll('.error').forEach(function(el) {
        el.textContent = '';
    });

    if (email === '') {
        document.querySelector('#email + .error').textContent = 'Email is required.';
        isValid = false;
    } else if (!validateEmail(email)) {
        document.querySelector('#email + .error').textContent = 'Invalid email format.';
        isValid = false;
    }

    if (password === '') {
        document.querySelector('#password + .error').textContent = 'Password is required.';
        isValid = false;
    }

    return isValid;
}

function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

document.getElementById('forgotPasswordForm').addEventListener('submit', function(event) {
    var email = document.getElementById('email').value;
    var errorSpan = document.querySelector('.error');
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (!email) {
        errorSpan.textContent = 'Email is required.';
        event.preventDefault();
    } else if (!emailPattern.test(email)) {
        errorSpan.textContent = 'Please enter a valid email address.';
        event.preventDefault();
    } else {
        errorSpan.textContent = '';
    }
});

document.getElementById('registrationForm').addEventListener('submit', function(event) {
    let isValid = true;
    let name = document.getElementById('name').value;
    let studentId = document.getElementById('student_id').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;

    document.querySelectorAll('.error').forEach(function(errorSpan) {
        errorSpan.textContent = '';
    });

    if (name.trim() === '') {
        document.querySelector('span.error[for="name"]').textContent = 'Full Name is required.';
        isValid = false;
    }

    let studentIdPattern = /^(00|01|02|03|04|05|06|07|08|09|10|11|12|14|15|16|17|18|19|20|21|22|23|24)-\d{5}-[1-3]$/;
    if (!studentIdPattern.test(studentId)) {
        document.querySelector('span.error[for="student_id"]').textContent = 'Student ID must be in the format 00-00000-0 or 22-00000-0 with the last digit being 1, 2, or 3.';
        isValid = false;
    }

    if (email.trim() === '') {
        document.querySelector('span.error[for="email"]').textContent = 'Email is required.';
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(email)) {
        document.querySelector('span.error[for="email"]').textContent = 'Email is invalid.';
        isValid = false;
    }

    if (password.trim() === '') {
        document.querySelector('span.error[for="password"]').textContent = 'Password is required.';
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});