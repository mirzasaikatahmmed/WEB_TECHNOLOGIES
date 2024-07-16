<?php
require_once 'Database.php';

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

function addUser($email, $password) {
    $conn = getConnection();
    $sql = "INSERT INTO users (email, password, status) VALUES (?, ?, 1)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ss", $email, $password);
    mysqli_stmt_execute($stmt);
    $insert_id = mysqli_insert_id($conn);
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    return $insert_id;
}
?>
