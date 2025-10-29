<?php

class Database
{
    public static $conn = null;
    public static function getConnection()
    {
        if (Database::$conn == null) {
            $servername = "localhost";
            $username = "fatheen-0037";
            $password = "200224501451";
            $dbname = "fatheen_newdb";

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