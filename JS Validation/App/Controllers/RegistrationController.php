<?PHP 
    SESSION_START();
    require_once '../Models/UserModel.php';

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] === "GET")
    {
        $error = "Registration Failed!";
        header("Location: ../Views/Authentication/Registration.php");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = sanitize($_POST['name']);
        $student_id = sanitize($_POST['student_id']);
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);

        $_SESSION['name'] = "";
        $_SESSION['student_id'] = "";
        $_SESSION['email'] = "";
        $_SESSION['password'] = "";
        $_SESSION['nameErr'] = "";
        $_SESSION['student_idErr'] = "";
        $_SESSION['emailErr'] = "";
        $_SESSION['passwordErr'] = "";
        $_SESSION['error'] = "";

        $validation_errors = validateRegistration($name, $student_id, $email, $password);

        if(!empty($validation_errors)) {
            $_SESSION['nameErr'] = $validation_errors['name'] ?? "";
            $_SESSION['student_idErr'] = $validation_errors['student_id'] ?? "";
            $_SESSION['emailErr'] = $validation_errors['email'] ?? "";
            $_SESSION['passwordErr'] = $validation_errors['password'] ?? "";
            header("Location: ../Views/Authentication/Registration.php");
            exit();
        }

        else {
            $user = getUserByEmail($email);
            if ($user) {
                $_SESSION['error'] = "Email already exists.";
                header("Location: ../Views/Authentication/Registration.php");
                exit();
            } 

            else {
                $user = addUser($name, $student_id, $email, $password);
                $_SESSION['error'] = "Registration successful!";
                header("Location: ../Views/Authentication/Login.php");
                exit();
            }
        }
    }

    else {
        header("Location: ../Views/Authentication/Registration.php");
    }

    function validateRegistration($name, $student_id, $email, $password) {
        $errors = [];

        if (empty($name)) {
            $errors['name'] = "Name is required.";
        } 
        
        if (empty($student_id)) {
            $errors['student_id'] = "Student ID is required.";
        } elseif (!preg_match('/^(00|01|02|03|04|05|06|07|08|09|10|11|12|14|15|16|17|18|19|20|21|22|23|24)-\d{5}-[1-3]$/', $student_id)) {
            $errors['student_id'] = "Invalid student ID format. It should be in the format xx-xxxxx-x.";
        }

        if (empty($email)) {
            $errors['email'] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        }

        if (empty($password)) {
            $errors['password'] = "Password is required.";
        }

        return $errors;
    }

?>