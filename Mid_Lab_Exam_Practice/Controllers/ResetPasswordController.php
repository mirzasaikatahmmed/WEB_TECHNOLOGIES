<?PHP
    SESSION_START();
    include '../Models/UserModel.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;
        $errors = [];

        if (empty($email)) {
            $errors['err1'] = "Email is required";
        }

        if (!empty($errors)) {
            $_SESSION['err1'] = $errors['err1'];
            header("Location: ../Views/Authentication/ResetPassword.php");
            exit();
        }

        $user = getUserByEmail($email);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: ../Views/Authentication/ChangePassword.php");
            exit();
        } else {
            $_SESSION['err2'] = "Email not found";
            header("Location: ../Views/Authentication/ResetPassword.php");
            exit();
        }
    }
    else {
        header("Location: ../Views/Authentication/ResetPassword.php");
        exit();
    }
?>