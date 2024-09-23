document.addEventListener("DOMContentLoaded", () => {
    // Login Form Logic
    const loginForm = document.getElementById('loginForm');
    if (loginForm) {
        const emailField = document.getElementById('email');
        const passwordField = document.getElementById('password');

        emailField.addEventListener('blur', validateEmail);
        passwordField.addEventListener('blur', validatePassword);

        loginForm.addEventListener('submit', (e) => {
            clearErrorMessages();

            let emailValid = validateEmail();
            let passwordValid = validatePassword();

            if (!emailValid || !passwordValid) {
                e.preventDefault();
            }
        });

        function validateEmail() {
            const email = emailField.value.trim();
            const emailError = document.getElementById('email-error-message');
            emailError.textContent = '';

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                emailError.textContent = 'Please enter a valid email address.';
                return false;
            }
            return true;
        }

        function validatePassword() {
            const password = passwordField.value.trim();
            const passwordError = document.getElementById('password-error-message');
            passwordError.textContent = '';

            if (password.length < 6) {
                passwordError.textContent = 'Password must be at least 6 characters.';
                return false;
            }
            return true;
        }

        function clearErrorMessages() {
            document.getElementById('email-error-message').textContent = '';
            document.getElementById('password-error-message').textContent = '';
        }
    }
});