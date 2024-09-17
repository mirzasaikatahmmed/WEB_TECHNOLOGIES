<?PHP 
    SESSION_START();
    require_once '../Models/UserModel.php';
    require_once '../Config/Database.php';

    function sanitize($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] === "GET")
    {
        $error = "Update Failed!";
        header("Location: ../Views/Users/Profile.php");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $id = sanitize($_POST['id']);
        $name = sanitize($_POST['name']);
        $student_id = sanitize($_POST['student_id']);
        $gender = $_POST['gender'];
        $email = $_SESSION['email'];
        
        if(!empty($validation_errors)) {
            $_SESSION['nameErr'] = $validation_errors['name'] ?? "";
            $_SESSION['student_idErr'] = $validation_errors['student_id'] ?? "";
            $_SESSION['passwordErr'] = $validation_errors['password'] ?? "";
            header("Location: ../Views/Users/Profile.php");
            exit();
        }
        else {
            $conn = getConnection();
            $id = getIDByEmail($conn, $_SESSION['email']);
            $user = updateUserProfile($id, $name, $student_id, $gender);
                $_SESSION['error'] = "Update successful!";
                header("Location: ../Views/Users/Profile.php");
                exit();
        }

    }
    else {
        header("Location: ../Views/Users/Profile.php");
    }

    function validateRegistration($name, $student_id, $gender) {
        $errors = [];

        if (empty($name)) {
            $errors['name'] = "Name is required.";
        } 
        
        if (empty($student_id)) {
            $errors['student_id'] = "Student ID is required.";
        } elseif (!preg_match('/^(00|01|02|03|04|05|06|07|08|09|10|11|12|14|15|16|17|18|19|20|21|22|23|24)-\d{5}-[1-3]$/', $student_id)) {
            $errors['student_id'] = "Invalid student ID format. It should be in the format xx-xxxxx-x.";
        }

        if (empty($gender)) {
            $errors['gender'] = "Gender is required.";
        }

        return $errors;
    }

?>