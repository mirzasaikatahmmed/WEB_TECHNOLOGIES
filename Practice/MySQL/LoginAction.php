<?php
session_start();

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $remember_me = isset($_POST['remember_me']) ? true : false;

    $_SESSION['uname'] = "";
    $_SESSION['pass'] = "";
    $_SESSION['usernameErr'] = "";
    $_SESSION['passwordErr'] = "";
    $_SESSION['msg3'] = "";

    $flag = true;

    if (empty($username)) {
        $flag = false;
        $_SESSION['usernameErr'] = "Please provide the username";
    } else {
        $_SESSION['uname'] = $username;
    }

    if (empty($password)) {
        $flag = false;
        $_SESSION['passwordErr'] = "Please provide the password";
    } else {
        $_SESSION['pass'] = $password;
    }

    if ($flag === true) {
        $servername = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "wt_users";

        $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM users WHERE Username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            if ($password === $row['Password']) {
                $_SESSION['Username'] = $username;
                $_SESSION['First_Name'] = $row['First_Name'];
                $_SESSION['Last_Name'] = $row['Last_Name'];
                $_SESSION['loggedInTime'] = time();

                if ($remember_me) {
                    date_default_timezone_set('Asia/Dhaka');
                    setcookie('username', $username, time() + (30 * 24 * 60 * 60), '/');
                    setcookie('password', $password, time() + (30 * 24 * 60 * 60), '/');
                } else {
                    date_default_timezone_set('Asia/Dhaka');
                    setcookie('username', $username, time() + (5 * 60), '/');
                    setcookie('password', $password, time() + (5 * 60), '/');
                }

                header("Location: Dashboard.php");
                exit();
            } else {
                $_SESSION['msg3'] = "Invalid username or password";
                header("Location: Login.php");
                exit();
            }
        } else {
            $_SESSION['msg3'] = "Invalid username or password";
            header("Location: Login.php");
            exit();
        }

        $stmt->close();
        $conn->close();
    } else {
        header("Location: Login.php");
        exit();
    }
} else {
    echo "Unauthorized Access";
}
?>
