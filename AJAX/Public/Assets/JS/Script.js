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

    // Registration Form Logic
    const registrationForm = document.getElementById('registrationForm');
    if (registrationForm) {
        const emailField = document.getElementById('email');
        const emailError = document.getElementById('email-error');
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('confirm_password');
        const fullNameField = document.getElementById('full_name');
        const studentIdField = document.getElementById('student_id');
        const genderField = document.getElementById('gender');

        const showError = (field, errorMessage, errorElement) => {
            if (field.value.trim() === '') {
                errorElement.textContent = errorMessage;
                field.classList.add('invalid');
            } else {
                errorElement.textContent = '';
                field.classList.remove('invalid');
            }
        };

        emailField.addEventListener('blur', function () {
            const email = emailField.value.trim();

            if (email !== "") {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../../../App/Controllers/CheckEmail.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const response = xhr.responseText;

                        emailError.textContent = '';

                        if (response === 'exists') {
                            emailError.textContent = 'Email already exists.';
                            emailField.classList.add('invalid');
                        } else {
                            emailField.classList.remove('invalid');
                        }
                    }
                };
                xhr.send('email=' + encodeURIComponent(email));
            } else {
                emailError.textContent = 'Email cannot be empty.';
                emailField.classList.add('invalid');
            }
        });

        passwordField.addEventListener('blur', function () {
            const passwordError = document.getElementById('password-error');
            showError(passwordField, 'Password cannot be empty.', passwordError);
        });

        confirmPasswordField.addEventListener('blur', function () {
            const confirmPasswordError = document.getElementById('confirm-password-error');
            showError(confirmPasswordField, 'Confirm Password cannot be empty.', confirmPasswordError);
        });

        fullNameField.addEventListener('blur', function () {
            const fullNameError = document.getElementById('name-error');
            showError(fullNameField, 'Full Name cannot be empty.', fullNameError);
        });

        studentIdField.addEventListener('blur', function () {
            const studentIdError = document.getElementById('student_id-error');
            showError(studentIdField, 'Student ID cannot be empty.', studentIdError);
        });

        document.querySelectorAll('input[required]').forEach(field => {
            const errorElement = document.getElementById(`${field.id}-error`);

            field.addEventListener('blur', function () {
                showError(field, `${field.name} cannot be empty.`, errorElement);
            });

            field.addEventListener('focus', function () {
                errorElement.textContent = '';
                field.classList.remove('invalid');
            });
        });

        genderField.addEventListener('blur', function () {
            const genderError = document.getElementById('gender-error');
            showError(genderField, 'Gender cannot be empty.', genderError);
        });

        document.querySelectorAll('input[required]').forEach(field => {
            const errorElement = document.getElementById(`${field.id}-error`);

            field.addEventListener('blur', function () {
                showError(field, `${field.name} cannot be empty.`, errorElement);
            });

            field.addEventListener('focus', function () {
                errorElement.textContent = '';
                field.classList.remove('invalid');
            });
        });

        registrationForm.addEventListener('submit', (e) => {
            const passwordError = document.getElementById('password-error');
            const confirmPasswordError = document.getElementById('confirm-password-error');

            passwordError.textContent = '';
            confirmPasswordError.textContent = '';

            if (passwordField.value.trim() !== confirmPasswordField.value.trim()) {
                e.preventDefault();
                confirmPasswordError.textContent = 'Passwords do not match.';
                confirmPasswordField.classList.add('invalid');
            }
        });
    }

    // Update Profile Form Logic
    const updateProfileForm = document.getElementById('updateProfileForm');
    if (updateProfileForm) {
        const fullNameField = document.getElementById('full_name');
        const studentIdField = document.getElementById('student_id');
        const genderField = document.getElementById('gender');
        const nameError = document.getElementById('name-error');
        const studentIdError = document.getElementById('student_id-error');
        const genderError = document.getElementById('gender-error');
        const statusMessage = document.getElementById('update-status');

        const showError = (field, errorMessage, errorElement) => {
            if (field.value.trim() === '') {
                errorElement.textContent = errorMessage;
                field.classList.add('invalid');
            } else {
                errorElement.textContent = '';
                field.classList.remove('invalid');
            }
        };

        fullNameField.addEventListener('blur', () => {
            showError(fullNameField, 'Full Name cannot be empty.', nameError);
        });

        studentIdField.addEventListener('blur', () => {
            showError(studentIdField, 'Student ID cannot be empty.', studentIdError);
        });

        genderField.addEventListener('blur', () => {
            showError(genderField, 'Gender cannot be empty.', genderError);
        });

        [fullNameField, studentIdField, genderField].forEach(field => {
            field.addEventListener('blur', function () {
                showError(field, `${field.name} cannot be empty.`, document.getElementById(`${field.id}-error`));
            });

            field.addEventListener('focus', function () {
                document.getElementById(`${field.id}-error`).textContent = '';
                field.classList.remove('invalid');
            });
        });

        updateProfileForm.addEventListener('submit', (e) => {
            const fullName = fullNameField.value.trim();
            const studentId = studentIdField.value.trim();
            const gender = genderField.value.trim();

            let valid = true;

            nameError.textContent = '';
            studentIdError.textContent = '';
            genderError.textContent = '';

            if (!fullName) {
                nameError.textContent = 'Full Name is required.';
                valid = false;
            }

            if (!studentId) {
                studentIdError.textContent = 'Student ID is required.';
                valid = false;
            }

            if (!gender) {
                genderError.textContent = 'Gender is required.';
                valid = false;
            }

            if (valid) {
                e.preventDefault();

                const formData = new FormData(updateProfileForm);

                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../../../App/Controllers/UpdateProfileController.php', true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const response = xhr.responseText;
                        statusMessage.textContent = response;
                    }
                };

                xhr.send(formData);
            } else {
                e.preventDefault();
            }
        });
    }

    // Change Password Form Logic
    const changePasswordForm = document.getElementById('changePasswordForm');
    if (changePasswordForm) {
        const oldPasswordField = document.getElementById('old_password');
        const newPasswordField = document.getElementById('new_password');
        const confirmNewPasswordField = document.getElementById('confirm_new_password');
        const oldPasswordError = document.getElementById('old-password-error');
        const newPasswordError = document.getElementById('new-password-error');
        const confirmNewPasswordError = document.getElementById('confirm-new-password-error');
        const statusMessage = document.getElementById('status-message');

        const showError = (field, errorMessage, errorElement) => {
            if (field.value.trim() === '') {
                errorElement.textContent = errorMessage;
                field.classList.add('invalid');
            } else {
                errorElement.textContent = '';
                field.classList.remove('invalid');
            }
        };

        oldPasswordField.addEventListener('blur', function () {
            const oldPassword = oldPasswordField.value.trim();

            if (oldPassword !== "") {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../../../App/Controllers/CheckOldPassword.php', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const response = xhr.responseText;

                        oldPasswordError.textContent = '';

                        if (response === 'incorrect') {
                            oldPasswordError.textContent = 'Old password is incorrect.';
                            oldPasswordField.classList.add('invalid');
                        } else {
                            oldPasswordField.classList.remove('invalid');
                        }
                    }
                };

                xhr.send('old_password=' + encodeURIComponent(oldPassword));
            } else {
                oldPasswordError.textContent = 'Old Password cannot be empty.';
                oldPasswordField.classList.add('invalid');
            }
        });

        changePasswordForm.addEventListener('submit', (e) => {
            e.preventDefault();

            oldPasswordError.textContent = '';
            newPasswordError.textContent = '';
            confirmNewPasswordError.textContent = '';
            statusMessage.textContent = '';

            const oldPassword = oldPasswordField.value.trim();
            const newPassword = newPasswordField.value.trim();
            const confirmNewPassword = confirmNewPasswordField.value.trim();

            let valid = true;

            if (oldPassword === '') {
                oldPasswordError.textContent = 'Old Password cannot be empty.';
                oldPasswordField.classList.add('invalid');
                valid = false;
            }

            if (newPassword === '') {
                newPasswordError.textContent = 'New Password cannot be empty.';
                newPasswordField.classList.add('invalid');
                valid = false;
            }

            if (confirmNewPassword === '') {
                confirmNewPasswordError.textContent = 'Confirm New Password cannot be empty.';
                confirmNewPasswordField.classList.add('invalid');
                valid = false;
            } else if (newPassword !== confirmNewPassword) {
                confirmNewPasswordError.textContent = 'Passwords do not match.';
                confirmNewPasswordField.classList.add('invalid');
                valid = false;
            }

            if (valid) {
                const formData = new FormData(changePasswordForm);

                const xhr = new XMLHttpRequest();
                xhr.open('POST', '../../../App/Controllers/ChangePasswordController.php', true);
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        const response = xhr.responseText;
                        statusMessage.textContent = response;

                        if (response === 'Password changed successfully.') {
                            changePasswordForm.reset();
                        }
                    }
                };

                xhr.send(formData);
            }
        });
    }

    const uploadForm = document.getElementById('uploadForm');
    if (uploadForm) {
        const fileInput = document.getElementById('file');
        const errorMessageDiv = document.getElementById('error-message');

        uploadForm.addEventListener('submit', (e) => {
            errorMessageDiv.style.display = 'none';
            errorMessageDiv.textContent = '';

            const file = fileInput.files[0];

            const allowedExtensions = ['jpg', 'jpeg', 'png'];
            const maxSize = 10 * 1024 * 1024; // 10 MB

            if (!file) {
                e.preventDefault();
                errorMessageDiv.style.display = 'block';
                errorMessageDiv.textContent = 'Please select a file to upload.';
                return;
            }

            const fileExtension = file.name.split('.').pop().toLowerCase();
            if (!allowedExtensions.includes(fileExtension)) {
                e.preventDefault();
                errorMessageDiv.style.display = 'block';
                errorMessageDiv.textContent = 'Invalid file type. Only JPG and PNG files are allowed.';
                return;
            }

            if (file.size > maxSize) {
                e.preventDefault();
                errorMessageDiv.style.display = 'block';
                errorMessageDiv.textContent = 'File size exceeds 10 MB limit.';
                return;
            }
        });
    }
});
