<?php
session_start();

function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$sessionVars = array('fname', 'lname', 'gender', 'faName', 'moName', 'bGroup', 'religion', 'email', 'mNumber', 'website', 'country', 'city', 'pAddress', 'zip', 'username', 'password', 'cPassword');
foreach ($sessionVars as $var) {
    $_SESSION[$var] = isset($_SESSION[$var]) ? $_SESSION[$var] : '';
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $fname = sanitize($_POST['fname']);
    $lname = sanitize($_POST['lname']);
    $gender = sanitize($_POST['gender']);
    $faName = sanitize($_POST['faName']);
    $moName = sanitize($_POST['moName']);
    $bGroup = sanitize($_POST['bGroup']);
    $religion = sanitize($_POST['religion']);
    $email = sanitize($_POST['email']);
    $mNumber = sanitize($_POST['mNumber']);
    $website = sanitize($_POST['website']);
    $country = sanitize($_POST['country']);
    $city = sanitize($_POST['city']);
    $pAddress = sanitize($_POST['pAddress']);
    $zip = sanitize($_POST['zip']);
    $username = sanitize($_POST['username']);
    $password = sanitize($_POST['password']);
    $cpassword = sanitize($_POST['cPassword']);

    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    $_SESSION['gender'] = $gender;
    $_SESSION['faName'] = $faName;
    $_SESSION['moName'] = $moName;
    $_SESSION['bGroup'] = $bGroup;
    $_SESSION['religion'] = $religion;
    $_SESSION['email'] = $email;
    $_SESSION['mNumber'] = $mNumber;
    $_SESSION['website'] = $website;
    $_SESSION['country'] = $country;
    $_SESSION['city'] = $city;
    $_SESSION['pAddress'] = $pAddress;
    $_SESSION['zip'] = $zip;
    $_SESSION['username'] = $username;

    $_SESSION['loginFailed'] = "";
    $flag = true;
    $errorMessages = array();

    if (empty($fname)) {
        $flag = false;
        $errorMessages['fnameErr'] = "Please provide the first name";
    }

    if (empty($lname)) {
        $flag = false;
        $errorMessages['lnameErr'] = "Please provide the last name";
    }

    if (empty($gender)) {
        $flag = false;
        $errorMessages['genderErr'] = "Please provide the gender";
    }

    if (empty($faName)) {
        $flag = false;
        $errorMessages['faNameErr'] = "Please provide the father's name";
    }

    if (empty($moName)) {
        $flag = false;
        $errorMessages['moNameErr'] = "Please provide the mother's name";
    }

    if (empty($bGroup)) {
        $flag = false;
        $errorMessages['bGroupErr'] = "Please provide the blood group";
    }

    if (empty($religion)) {
        $flag = false;
        $errorMessages['religionErr'] = "Please provide the religion";
    }

    if (empty($email)) {
        $flag = false;
        $errorMessages['emailErr'] = "Please provide the email";
    }

    if (empty($mNumber)) {
        $flag = false;
        $errorMessages['mNumberErr'] = "Please provide the mobile number";
    }

    if (empty($website)) {
        $flag = false;
        $errorMessages['websiteErr'] = "Please provide the website";
    }

    if (empty($country)) {
        $flag = false;
        $errorMessages['countryErr'] = "Please provide the country";
    }

    if (empty($city)) {
        $flag = false;
        $errorMessages['cityErr'] = "Please provide the city";
    }

    if (empty($pAddress)) {
        $flag = false;
        $errorMessages['pAddressErr'] = "Please provide the present address";
    }

    if (empty($zip)) {
        $flag = false;
        $errorMessages['zipErr'] = "Please provide the zip code";
    }

    if (empty($username)) {
        $flag = false;
        $errorMessages['usernameErr'] = "Please provide the username";
    } else {
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

        if ($result->num_rows > 0) {
            $flag = false;
            $errorMessages['usernameErr'] = "Username already exists. Please choose a different username.";
        }

        $stmt->close();
        $conn->close();
    }

    if (empty($password)) {
        $flag = false;
        $errorMessages['passwordErr'] = "Please provide the password";
    }

    if ($password !== $cpassword) {
        $flag = false;
        $errorMessages['cPasswordErr'] = "Passwords do not match";
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

        $address = $pAddress . ", " . $city . "-" . $zip . ", " . $country;

        $sql = $conn->prepare("INSERT INTO users (First_Name, Last_Name, Gender, Fathers_Name, Mothers_Name, Blood_Group, Religion, Email, Phone, Website, Address, Username, Password, Registration_Date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())");
        $sql->bind_param("sssssssssssss", $fname, $lname, $gender, $faName, $moName, $bGroup, $religion, $email, $mNumber, $website, $address, $username, $password);

        if ($sql->execute()) {
            echo "Registration complete.";
            header("Location: Login.php");
            exit();
        } else {
            echo "Error: " . $sql->error;
        }

        $sql->close();
        $conn->close();
    } else {
        foreach ($errorMessages as $key => $message) {
            $_SESSION[$key] = $message;
        }
        
        header("Location: Registration.php");
        exit();
    }
}
?>
