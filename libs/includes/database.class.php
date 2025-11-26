<?php

class Database
{
    public static $conn = null;
    public static function getConnection()
    {
        if (Database::$conn == null) {
            $servername = get_config('db_server');
            $username = get_config('db_username');
            $password = get_config('db_password');
            $dbname = get_config('db_name');

            mysqli_report(MYSQLI_REPORT_OFF);

            // Create connection
            $connection = new mysqli($servername, $username, $password, $dbname);
            //print ($conn);
            // Check connection
            if ($connection->connect_error) {
                // This is the line you want to see if the connection fails:
                //die("Connection lost: " . $conn->connect_error); 
                echo "connected failed" . $connection->connect_error;
            } else {
                //echo "connected sucessfully....... assigning new connection";
                Database::$conn = $connection;
                return Database::$conn; // Return the connection if successful
            }

        }
        else {
            echo "using existing connection";
            return Database::$conn; // Return existing connection
        }
    }
}

?>