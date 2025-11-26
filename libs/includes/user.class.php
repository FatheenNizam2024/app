<?php 

class User 
{
    private $conn;
    private $username;
    private $id;

    public function __call ($name, $arguments) {
        // Handle dynamic method calls if needed
        $property = preg_replace("/[^0-9a-zA-Z]/", "", substr($name, 3));
        $property = strtolower(preg_replace('/\B([A-Z])/', '_$1', $property));
        if(substr($name, 0, 3) === 'get') {
            return $this->_get_data($property);
        } elseif (substr($name, 0, 3) === 'set') {
            return $this->_set_data($property, $arguments[0]);
    }
}
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
                return $row['username'];
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
        $this->username = $Username;
        $this->id = null;

        // gets the id from auth table
        $sql = "SELECT `id` FROM auth WHERE username = '$Username' LIMIT 1";
        $result = $this->conn->query($sql);
        if ($result->num_rows == 1){
            $row = $result->fetch_assoc();
            $this->id = $row['id'];
    }else{
        throw new Exception("User not found"); //can you echo instead of throw new Exception
    }
}
    // 1. DYNAMIC GETTERS AND SETTERS
    private function _get_data($var) {
        if(!$this->conn) {
            $this->conn = Database::getConnection();
        }
        $sql = "SELECT `$var` FROM users WHERE id = '$this->id'";
        $result = $this->conn->query($sql);
        if ($result and $result->num_rows == 1){
            return $result->fetch_assoc()[$var];
    }
    else{
        return null;
    }
}

private function _set_data($var, $data) {
        if(!$this->conn) {
            $this->conn = Database::getConnection();
        }
        $sql = "UPDATE `users` SET `$var` = '$data' WHERE `id` = '$this->id'";
        if ($this->conn->query($sql)) {
            return true;
    }
    else{
        return false;
    }
}

    public function getUsername(){

        return $this->username;

    }

    public static function authentication(){

    }

    // public static function getBio() {

    // }

    // public static function setBio() {

    // }

    // public static function getAvatar() {

    // }

    // public static function setAvatar() {

    // }
}
?>