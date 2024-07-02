<?php
    session_start();

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
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
        $username = sanitize($_POST['username']);
        $password = sanitize($_POST['password']);

        $_SESSION['fname'] = "";
        $_SESSION['lname'] = "";
        $_SESSION['gender'] = "";
        $_SESSION['faName'] = "";
        $_SESSION['moName'] = "";
        $_SESSION['bGroup'] = "";
        $_SESSION['religion'] = "";
        $_SESSION['email'] = "";
        $_SESSION['mNumber'] = "";
        $_SESSION['website'] = "";
        $_SESSION['username'] = "";
        $_SESSION['password'] = "";
        $_SESSION['cpassword'] = "";

        $_SESSION['loginFailed'] = "";
        $flag = true;

        if(empty($fname)) {
            $flag = false;
            $_SESSION['fnameErr'] = "Please provide the first name";
        }
        else {
            $_SESSION['fname'] = $fname;
        }

        if(empty($lname)) {
            $flag = false;
            $_SESSION['lnameErr'] = "Please provide the last name";
        }
        else {
            $_SESSION['lname'] = $lname;
        }

        if(empty($gender)) {
            $flag = false;
            $_SESSION['genderErr'] = "Please provide the gender";
        }
        else {
            $_SESSION['gender'] = $gender;
        }

        if(empty($faName)) {
            $flag = false;
            $_SESSION['faNameErr'] = "Please provide the father's name";
        }
        else {
            $_SESSION['faName'] = $faName;
        }

        if(empty($moName)) {
            $flag = false;
            $_SESSION['moNameErr'] = "Please provide the mother's name";
        }
        else {
            $_SESSION['moName'] = $moName;
        }

        if(empty($bGroup)) {
            $flag = false;
            $_SESSION['bGroupErr'] = "Please provide the blood group";
        }
        else {
            $_SESSION['bGroup'] = $bGroup;
        }

        if(empty($religion)) {
            $flag = false;
            $_SESSION['religionErr'] = "Please provide the religion";
        }
        else {
            $_SESSION['religion'] = $religion;
        }

        if(empty($email)) {
            $flag = false;
            $_SESSION['emailErr'] = "Please provide the email";
        }
        else {
            $_SESSION['email'] = $email;
        }

        if(empty($mNumber)) {
            $flag = false;
            $_SESSION['mNumberErr'] = "Please provide the mobile number";
        }
        else {
            $_SESSION['mNumber'] = $mNumber;
        }

        if(empty($website)) {
            $flag = false;
            $_SESSION['websiteErr'] = "Please provide the website";
        }
        else {
            $_SESSION['website'] = $website;
        }

        if(empty($username)) {
            $flag = false;
            $_SESSION['usernameErr'] = "Please provide the username";
        }
        else {
            $_SESSION['username'] = $username;
        }

        if(empty($password)) {
            $flag = false;
            $_SESSION['passwordErr'] = "Please provide the password";
        }
        else {
            $_SESSION['password'] = $password;
        }

        if ($flag === true) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "wt_users";
    
            $conn = new mysqli($servername, $username, $password, $dbname);
    
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            if($conn->query("SELECT * FROM users WHERE Username = '$username'")->num_rows > 0) {
                $_SESSION['loginFailed'] = "Username already exists";
                header("Location: Registration.php");
                exit();
            }
    
            $sql = $conn->prepare("INSERT INTO users (First_Name, Last_Name, Gender, Father's_Name, Mother's_Name, Blood_Group, Religion, Email, Phone, Website, Username, Password, Registration_Date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW()");
            $sql->bind_param($fname, $lname, $gender, $faName, $moName, $bGroup, $religion, $email, $mNumber, $website, $username, $password);
    
            if ($sql->execute()) {
                echo "New record created successfully";
                header("Location: Login.php");
                exit();
            } else {
                echo "Error: " . $sql->error;
            }
    
            $sql->close();
            $conn->close();
        }

    }



?>