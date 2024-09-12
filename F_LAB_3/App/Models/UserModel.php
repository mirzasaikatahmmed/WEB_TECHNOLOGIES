<?php 
require_once './Database.php';
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

?>