<?php 
    session_start();
    require_once '../Models/UserModel.php';
    
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $error = 'Login request is invalid';
        header("Location: ../Views/Authentication/Login.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);
        $_SESSION['email'] = $email;
        $_SESSION['password'] = $password;
        $_SESSION['err3'] = "";
        $_SESSION['isLoggedIn'] = false;

        $isUser = matchCredentials($email, $password);
        if ($isUser) {
            $_SESSION['isLoggedIn'] = true;

            date_default_timezone_set('Asia/Dhaka');
            $cookieDuration = isset($_POST['remember_me']) ? (86400 * 7) : (86400 * 1);
            setcookie('email', $email, time() + $cookieDuration, "/");
            
            header("Location: ../Views/Users/Dashboard.php");
            exit();
        } else {
            $_SESSION['err3'] = "Login Failed ... !";
            header("Location: ../Views/Authentication/Login.php");
            exit();
        }
    }
?>
