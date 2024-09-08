<?PHP
SESSION_START();
require_once '../Models/UserModel.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_SESSION['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $errors = [];

    if (empty($password)) {
        $errors['err1'] = "Password is required";
    }

    if (empty($confirmPassword)) {
        $errors['err2'] = "Confirm Password is required";
    }

    if ($password !== $confirmPassword) {
        $errors['err3'] = "Password and Confirm Password must be same";
    }

    if (!empty($errors)) {
        $_SESSION['password'] = $password;
        $_SESSION['confirmPassword'] = $confirmPassword;
        $_SESSION['errors'] = $errors;
        header("Location: ../Views/Authentication/ChangePassword.php");
        exit();
    }

    $user = getUserByEmail($email);
    if ($user) {
        $user['password'] = $password;
        $result = updateUser($user);
        if ($result) {
            header("Location: ../Views/Authentication/Login.php");
            exit();
        } else {
            $_SESSION['err4'] = "Password not changed";
            header("Location: ../Views/Authentication/ChangePassword.php");
            exit();
        }
    } else {
        $_SESSION['err5'] = "Email not found";
        header("Location: ../Views/Authentication/ChangePassword.php");
        exit();
    }
}
?>