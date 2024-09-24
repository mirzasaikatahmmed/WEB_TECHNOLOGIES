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

    //Product Form Logic
    const productList = document.getElementById('productList');
    if (productList) {
        loadProducts();

        function loadProducts() {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', '../../Controllers/ProductController.php?action=fetch_products', true);
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success && response.products.length > 0) {
                        productList.innerHTML = generateProductTable(response.products);
                    } else {
                        productList.innerHTML = '<p>No products found.</p>';
                    }
                }
            };
            xhr.send();
        }

        function generateProductTable(products) {
            let table = `<table>
                <tr>
                    <th>Product ID</th>
                    <th>Merchant ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>`;
            
            products.forEach(product => {
                table += `
                <tr>
                    <td>${product.product_id}</td>
                    <td>${product.merchant_id}</td>
                    <td>${product.name}</td>
                    <td>${product.description}</td>
                    <td>${product.price}</td>
                    <td>${product.stock}</td>
                    <td><img src="../../Uploads/Products/${product.product_image}" alt="${product.name}" width="50"></td>
                    <td>
                        <button onclick="editProduct(${product.product_id})">Edit</button>
                        <button onclick="deleteProduct(${product.product_id})">Delete</button>
                    </td>
                </tr>`;
            });
            table += '</table>';
            return table;
        }
    }

    function editProduct(productId) {
        window.location.href = `edit_product.php?product_id=${productId}`;
    }

    function deleteProduct(productId) {
        if (confirm('Are you sure you want to delete this product?')) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../../Controllers/ProductController.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        alert('Product deleted successfully!');
                        loadProducts();
                    } else {
                        alert('Failed to delete product.');
                    }
                }
            };
            xhr.send(`action=delete_product&product_id=${productId}`);
        }
    }

    // Update Profile Admin
    const updateProfileAdminForm = document.getElementById('updateProfileAdminForm');
    if (updateProfileAdminForm) {
        const nameField = document.getElementById('name');
        const emailField = document.getElementById('email');
        const nameError = document.getElementById('name-error');
        const emailError = document.getElementById('email-error');
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

        nameField.addEventListener('blur', () => {
            showError(nameField, 'Full Name cannot be empty.', nameError);
        });

        emailField.addEventListener('blur', () => {
            showError(emailField, 'Email cannot be empty.', emailField);
        });

        [nameField, emailField].forEach(field => {
            field.addEventListener('blur', function () {
                showError(field, `${field.name} cannot be empty.`, document.getElementById(`${field.id}-error`));
            });

            field.addEventListener('focus', function () {
                document.getElementById(`${field.id}-error`).textContent = '';
                field.classList.remove('invalid');
            });
        });

        updateProfileAdminForm.addEventListener('submit', (e) => {
            const name = nameField.value.trim();
            const email = emailField.value.trim();

            let valid = true;

            nameError.textContent = '';
            emailError.textContent = '';

            if (!name) {
            nameError.textContent = 'Full Name is required.';
            valid = false;
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!email) {
            emailError.textContent = 'Email is required.';
            valid = false;
            } else if (!emailRegex.test(email)) {
            emailError.textContent = 'Please enter a valid email address.';
            valid = false;
            }

            if (valid) {
            e.preventDefault();

            const formData = new FormData(updateProfileAdminForm);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', '../../../App/Controllers/ProfileController.php', true);
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
});