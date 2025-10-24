<?php 
class User 
{
    private $conn;
   public static function signup ($Username, $Password, $email, $phone) 

{
     
      $Password = md5(strrev(md5($Password)));

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