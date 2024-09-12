<?php

require_once __DIR__ . '/../Config/Database.php';

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

function isEmailUnique($email) {
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $is_unique = mysqli_num_rows($result) == 0;
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $is_unique;
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
    $sql = "UPDATE users SET password = ?, updated_at = NOW() WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "si", $user['password'], $user['id']);
    mysqli_stmt_execute($stmt);
    $affected_rows = mysqli_stmt_affected_rows($stmt);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $affected_rows === 1;
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

function getFilesByID($ID) {
    $conn = getConnection();
    $stmt = $conn->prepare("SELECT image_file_name FROM files WHERE userID = ?");
    $stmt->bind_param("i", $ID);
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


