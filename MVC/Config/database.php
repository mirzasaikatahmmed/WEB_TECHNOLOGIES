<?php
class Database {
    private static $host = 'localhost';
    private static $db_name = 'wt_users';
    private static $username = 'root';
    private static $password = '';
    public static $conn;

    public static function connect() {
        if (!isset(self::$conn)) {
            self::$conn = new mysqli(self::$host, self::$username, self::$password, self::$db_name);
            if (self::$conn->connect_error) {
                die('Connection failed: ' . self::$conn->connect_error);
            }
        }
        return self::$conn;
    }
}
?>
