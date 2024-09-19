<?php
function getConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "image_store";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function getUserByEmail($email) {
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    return $user;
}

function checkEmailExists($email) {
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    mysqli_close($conn);
    return mysqli_num_rows($result) > 0;
}

function registerUser($full_name, $student_id, $gender, $email, $password) {
    $conn = getConnection();
    $sql = "INSERT INTO users (name, student_id, gender, email, password) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'sssss', $full_name, $student_id, $gender, $email, $password);
    $result = mysqli_stmt_execute($stmt);
    mysqli_close($conn);
    return $result;
}

function getUserById($id) {
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $user;
}

function updateUserProfile($userId, $fullName, $studentId, $gender) {
    $conn = getConnection();
    $stmt = $conn->prepare("UPDATE users SET name = ?, student_id = ?, gender = ? WHERE id = ?");
    $stmt->bind_param("sssi", $fullName, $studentId, $gender, $userId);
    $result = $stmt->execute();
    $stmt->close();
    $conn->close();

    return $result;
}

function updateUserPassword($userId, $newPassword) {
    $conn = getConnection();
    $stmt = $conn->prepare('UPDATE users SET password = ? WHERE id = ?');
    $stmt->bind_param('si', $newPassword, $userId);
    return $stmt->execute();
}

function getIDByEmail($conn, $email) {
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['id'];
    } else {
        return null;
    }
}

function insertFileData($conn, $fileNameNew, $userID) {
    $stmtCheck = $conn->prepare("SELECT id FROM users WHERE id = ?");
    $stmtCheck->bind_param("i", $userID);
    $stmtCheck->execute();
    $resultCheck = $stmtCheck->get_result();

    if ($resultCheck->num_rows > 0) {
        $stmt = $conn->prepare("INSERT INTO files (image_file_name, userID) VALUES (?, ?)");
        $stmt->bind_param("si", $fileNameNew, $userID);
        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}
?>
