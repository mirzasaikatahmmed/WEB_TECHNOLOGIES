<?PHP 
    SESSION_START();
    SESSION_DESTROY();
    HEADER('LOCATION: ../Views/Authentication/Login.php');
?>