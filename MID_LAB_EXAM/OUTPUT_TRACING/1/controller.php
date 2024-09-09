<?PHP
    SESSION_START();

    echo "A" . isset($_SESSION['name']);
    echo "B" . empty($_SESSION['name']);

?>