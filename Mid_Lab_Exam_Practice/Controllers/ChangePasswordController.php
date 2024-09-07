<?PHP
SESSION_START();
require_once '../Models/UserModel.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $user = getUserByEmail($email);
    if ($user) {
        $affected_rows = resetPassword($email);
        if ($affected_rows === 1) {
            $_SESSION['err2'] = "Email found.";
            header ('Location: ../Views/Authentication/ChangePassword.php');
        } else {
            $_SESSION['err2'] = "Email not found. Please try again.";
        }
    } else {
        $_SESSION['err1'] = "Email not found.";
    }
    $_SESSION['email'] = $email;
    header('Location: ../Views/Authentication/ResetPassword.php');
} else {
    header('Location: ../Views/Authentication/ResetPassword.php');
}
?>