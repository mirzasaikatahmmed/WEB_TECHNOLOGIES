<?PHP
SESSION_START();
session_destroy();
header ('Location: ../Views/Auth/Login.php');
exit;
?>