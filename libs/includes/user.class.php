<?php 

class User 
{
    private $conn;
    //private static $salt = "auth@test1234567";
   public static function signup ($Username, $Password, $email, $phone) 

{
     
      //$Password = md5(strrev(md5($Password)). User::$salt); //  security through obscurity

      $options = [
        // Increase the bcrypt cost from 12 to 13.
        'cost' => 10,
    ];
        $Password = password_hash($Password, PASSWORD_BCRYPT, $options);

      $conn = Database::getConnection();

        $sql = "INSERT INTO `auth` (`id`, `username`, `password`, `email`, `phone`, `blocked`, `active`) 
        VALUES (NULL, '$Username', '$Password', '$email', '$phone', '0', '0')";

        $error = false;

        if ($conn->query($sql) === TRUE) {
        $error = false; // no errors
        } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        $error = $conn->error;
        }

        $conn->close();

        return $error;
    }

    public static function login ($Username, $Password) 
    {
        //$Password = md5(strrev(md5($Password)). User::$salt); // , security through obscurity

        $query = "SELECT  * FROM auth WHERE username = '$Username' ";
        $conn = Database::getConnection();
        //print("Excuting query: $query\n");
        $result = $conn->query($query);
        //print("Query executed. Number of rows: " . $result->num_rows . "\n");

        if ($result->num_rows == 1){

            $row = $result->fetch_assoc();
            //print_r($row['password']. "\n");
            //print($Password."\n");
            if (password_verify($Password, $row['password'])) {
                //print("Password match\n");
                return $row;
        }
        else {
            //print("Password does not match\n");
            return false;
        }
    }
    else {
        return false;
       }
    }
    

    public function __construct($Username){
        $this->conn = Database::getConnection();
        $this->conn->query();
    }

    public static function authentication(){

    }

    public static function getBio() {

    }

    public static function setBio() {

    }

    public static function getAvatar() {

    }

    public static function setAvatar() {

    }
}


?>