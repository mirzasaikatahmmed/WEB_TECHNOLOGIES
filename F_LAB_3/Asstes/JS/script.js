function isValid(form) {
    let valid = true;

    document.getElementById('err1').innerText = '';
    document.getElementById('err2').innerText = '';

    const email = form.username.value.trim();
    if (email === '') {
        document.getElementById('err1').innerText = 'Email is required.';
        valid = false;
    } else if (!/^\S+@\S+\.\S+$/.test(email)) {
        document.getElementById('err1').innerText = 'Invalid email format.';
        valid = false;
    }

    const password = form.password.value.trim();
    if (password === '') {
        document.getElementById('err2').innerText = 'Password is required.';
        valid = false;
    } else if (password.length < 6) {
        document.getElementById('err2').innerText = 'Password must be at least 6 characters long.';
        valid = false;
    }

    return valid;
}