<?PHP 

    require_once '../../Config/Database.php';
    
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
        return $user ?: null;
    }

    function addUser($name, $student_id, $email, $password) {
        $conn = getConnection();
        $sql = "INSERT INTO users (name, student_id, email, password, created_at, updated_at, status) VALUES (?, ?, ?, ?, NOW(), NOW(), 2)";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "ssss", $name, $student_id, $email, $password);
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

    function getStudentIDByEmail($email) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT student_id FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $student_id = $row['student_id'];
        $stmt->close();
        $conn->close();
        return $student_id;
    }

    function insertFileData($studentID, $fileNameNew) {
        $conn = getConnection();
        $stmt = $conn->prepare("INSERT INTO files (student_id, image_file_name, upload_time) VALUES (?, ?, NOW())");
        $stmt->bind_param("is", $studentID, $fileNameNew);
        $stmt->execute();
        $stmt->close();
        $conn->close();
    }

    function getFilesByStudentID($studentID) {
        $conn = getConnection();
        $stmt = $conn->prepare("SELECT image_file_name FROM files WHERE student_id = ?");
        $stmt->bind_param("i", $studentID);
        $stmt->execute();
        $result = $stmt->get_result();
        $files = [];
        while ($row = $result->fetch_assoc()) {
            $files[] = $row['image_file_name'];
        }
        $stmt->close();
        $conn->close();
        return $files;
    }


