<?php
    require_once '../../Config/Database.php';

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
?>