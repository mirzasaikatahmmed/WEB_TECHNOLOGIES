document.getElementById('loginForm').addEventListener('submit', function(event) {
    let isValid = true;

    // Clear previous errors
    document.getElementById('emailError').textContent = '';
    document.getElementById('passwordError').textContent = '';

    // Validate email
    const email = document.getElementById('email').value;
    if (!email) {
        document.getElementById('emailError').textContent = 'Email is required.';
        isValid = false;
    } else if (!/\S+@\S+\.\S+/.test(email)) {
        document.getElementById('emailError').textContent = 'Please enter a valid email address.';
        isValid = false;
    }

    // Validate password
    const password = document.getElementById('password').value;
    if (!password) {
        document.getElementById('passwordError').textContent = 'Password is required.';
        isValid = false;
    }

    if (!isValid) {
        event.preventDefault();
    }
});