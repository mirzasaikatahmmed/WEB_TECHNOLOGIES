<?php 
    session_start();
    require_once '../Models/UserModel.php';
    
    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    // Check if the user is already logged in
    if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
        header("Location: ../Views/Users/Dashboard.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $error = 'Login request is invalid';
        header("Location: ../Views/Authentication/Login.php");
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);
        $isValid = true;
        $_SESSION['err1'] = "";
        $_SESSION['err2'] = "";
        $_SESSION['email'] = "";
        $_SESSION['password'] = "";
        $_SESSION['err3'] = "";
        $_SESSION['isLoggedIn'] = false;

        if (empty($email)) {
            $_SESSION['err1'] = "Please fill up the email properly";
            $isValid = false;
        } else {
            $_SESSION['email'] = $email;
        }

        if (empty($password)) {
            $_SESSION['err2'] = "Please fill up the password properly";
            $isValid = false;
        } else {
            $_SESSION['password'] = $password;
        }

        if ($isValid === true) {
            $isUser = matchCredentials($email, $password);
            if ($isUser) {
                $_SESSION['isLoggedIn'] = true;
                header("Location: ../Views/Users/Dashboard.php");
                exit();
            } else {
                $_SESSION['err3'] = "Login Failed ... !";
                header("Location: ../Views/Authentication/Login.php");
                exit();
            }
        } else {
            header("Location: ../Views/Authentication/Login.php");
            exit();
        }
    }
?>