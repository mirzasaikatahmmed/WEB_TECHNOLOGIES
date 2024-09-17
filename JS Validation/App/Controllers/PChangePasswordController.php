<?PHP
SESSION_START();
require_once '../Models/UserModel.php';

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $errors['err3'] = "Unauthorized access";
    header("Location: ../Views/Authentication/ChangePassword.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_SESSION['email'];
    $currentPassword = $_POST['currentPassword'];
    $newpassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];

    if (empty($currentPassword)) {
        $errors['err1'] = "Current Password is required";
    }
    
    if (empty($newPassword)) {
        $errors['err1'] = "New Password is required";
    }

    if (empty($confirmPassword)) {
        $errors['err2'] = "Confirm Password is required";
    }

    if ($newPassword !== $confirmPassword) {
        $errors['err3'] = "Password and Confirm Password must be same";
    }

    if (!empty($errors)) {
        $_SESSION['currentPassword'] = $currentPassword;
        $_SESSION['newPassword'] = $newPassword;
        $_SESSION['confirmPassword'] = $confirmPassword;
        $_SESSION['errors'] = $errors;
        header("Location: ../Views/Users/ChangePassword.php");
        exit();
    }

    $user = getUserByEmail($email);
    if ($user) {
        if ($currentPassword === $user['password']) {
            $user['password'] = $newPassword;
            $result = updateUser($user);
            if ($result) {
            header("Location: ../Views/Authentication/Login.php");
            exit();
            } else {
            $_SESSION['err4'] = "Password not changed";
            header("Location: ../Views/Users/ChangePassword.php");
            exit();
            }
        } else {
            $_SESSION['err6'] = "Current password is incorrect";
            header("Location: ../Views/Users/ChangePassword.php");
            exit();
        }
    }
    } else {
        $_SESSION['err5'] = "Email not found";
        header("Location: ../Views/Users/ChangePassword.php");
        exit();
    }
?>