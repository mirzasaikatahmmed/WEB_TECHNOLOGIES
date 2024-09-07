<?PHP 
    SESSION_START();
    require_once '../Models/UserModel.php';
    require_once '../Models/ValidationCheckModel.php';

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);

        $_SESSION['name'] = "";
        $_SESSION['email'] = "";
        $_SESSION['password'] = "";
        $_SESSION['nameErr'] = "";
        $_SESSION['emailErr'] = "";
        $_SESSION['passwordErr'] = "";
        $_SESSION['msg2'] = "";

        $validation_errors = validateRegistration($name, $email, $password);

        if(!empty($validation_errors)) {
            $_SESSION['nameErr'] = $validation_errors['name'] ?? "";
            $_SESSION['emailErr'] = $validation_errors['email'] ?? "";
            $_SESSION['passwordErr'] = $validation_errors['password'] ?? "";
            header("Location: ../Views/Authentication/Registration.php");
            exit();
        }

        else {
            $user = getUserByEmail($email);
            if ($user) {
                $_SESSION['msg2'] = "Email already exists.";
                header("Location: ../Views/Authentication/Registration.php");
                exit();
            } 

            else {
                $user = addUser($name, $email, $password);
                $_SESSION['msg2'] = "Registration successful!";
                header("Location: ../Views/Authentication/Login.php");
                exit();
            }
        }
    }

    else {
        header("Location: ../Views/Authentication/Registration.php");
    }

    function validateRegistration($name, $email, $password) {
        $errors = [];

        if (empty($name)) {
            $errors['name'] = "Name is required.";
        } 

        if (empty($email)) {
            $errors['email'] = "Email is required.";
        } 
        
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Invalid email format.";
        }

        if (empty($password)) {
            $errors['password'] = "Password is required.";
        }

        return $errors;
    }

?>