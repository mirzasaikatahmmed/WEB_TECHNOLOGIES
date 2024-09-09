<?php
    require_once 'Database.php';

    function getBalance($AccountNumber) {
        $conn = getConnection();
        $sql = "SELECT Balance FROM accounts WHERE AccountNumber = '$AccountNumber'";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_assoc();
    }

    function updateBalance($AccountNumber, $Balance) {
        $conn = getConnection();
        $sql = "UPDATE accounts SET Balance = '$Balance' WHERE AccountNumber = '$AccountNumber'";
        $conn->query($sql);
        $conn->close();
    }

    function getAccount($AccountNumber) {
        $conn = getConnection();
        $sql = "SELECT * FROM accounts WHERE AccountNumber = '$AccountNumber'";
        $result = $conn->query($sql);
        $conn->close();
        return $result->fetch_assoc();
    }
?>
