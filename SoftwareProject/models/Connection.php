<?php
class Connection {

    static $conn;

    // DB connect
    public static function connect($host = 'mysql5019.site4now.net', $dbName = 'db_a57458_sw2', $username = 'a57458_sw2', $password = 'SW123456789'){
        Connection::$conn = null;
        try{
            Connection::$conn = new PDO('mysql:host=' . $host . ';dbname=' . $dbName, $username, $password);
            Connection::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Connection error: ' . $e->getMessage();
        }
        
        return Connection::$conn;
    }
}
?>
