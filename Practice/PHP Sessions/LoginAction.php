<?php

    session_start();

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER['REQUEST_METHOD'] === "POST") {
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);
        $_SESSION['uname'] = "";
        $_SESSION['pass'] = "";
        $_SESSION['usernameErr'] = "";
        $_SESSION['passwordErr'] = "";
        $_SESSION['msg3'] = "";
        $flag = true;

        if(empty($username)) {
            $flag = false;
            $_SESSION['usernameErr'] = "Please provide the username";
        }
        else {
            $_SESSION['uname'] = $username;
        }
        if(empty($password)) {
            $flag = false;
            $_SESSION['passwordErr'] = "Please provide the password";
        }
        else {
            $_SESSION['pass'] = $password;
        }

        if ($flag === true) {
            if ($username === "admin" and $password === "admin") {
                $_SESSION['loggedInTime'] = time();
                header("Location: Dashboard.php");
            }
            else {
                $_SESSION['msg3'] = "Login Failed...!";
                header("Location: Login.php");
            }
        }
        else {
            header("Location: Login.php");
        }
    
    }
    else {
        echo "Unauthorized Access;";
    }
?>