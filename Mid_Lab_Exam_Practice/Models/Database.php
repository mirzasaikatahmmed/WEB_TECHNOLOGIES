<?PHP 
    function getConnection(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "web_technologies";


        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    
        return $conn;
    }
?>