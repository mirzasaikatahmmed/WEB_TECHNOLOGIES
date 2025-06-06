<?PHP 
    
    include '../Models/Database.php';


    function matchCredentials ($email, $password) {
        $conn = getConnection();
        $sql = "SELECT id, email, password FROM users WHERE email = ? and password = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) === 1) {
            return true;
        }
        return false;
    }

    function getUserByEmail($email) {
        $conn = getConnection();
        if ($conn === false) {
            return null;
        }
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);
        if ($stmt === false) {
            mysqli_close($conn);
            return null;
        }
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $user = mysqli_fetch_assoc($result);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $user ? $user : null;
    }

    function addUser($name, $email, $password) {
        $conn = getConnection();
        $sql = "INSERT INTO users (name, email, password, create_date, status) VALUES (?, ?, ?, NOW(), 1)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
        mysqli_stmt_execute($stmt);
        $insert_id = mysqli_insert_id($conn);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $insert_id;
    }

    function updateUser ($user) {
        $conn = getConnection();
        $sql = "UPDATE users SET password = ? WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "si", $user['password'], $user['id']);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $affected_rows === 1;
    }

    function deleteUser ($user) {
        $conn = getConnection();
        $sql = "DELETE FROM users WHERE id = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $user['id']);
        mysqli_stmt_execute($stmt);
        $affected_rows = mysqli_stmt_affected_rows($stmt);
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
        return $affected_rows === 1;
    }
?>