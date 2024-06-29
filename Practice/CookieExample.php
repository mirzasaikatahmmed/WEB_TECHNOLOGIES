<?php
    setcookie("user", "Alex Porter", time() + 30);
    echo "Hello World!";

    echo "<hr>";
    echo $_COOKIE['user'];
?>