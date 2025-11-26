<?php 

class User 
{
    private $conn;
    private $id;
    private $username;
    private $email;
    private $phone;
    private $blocked;
    private $active;
    private $bio;
    private $avatar;

    // 1. CONSTRUCTOR: Loads user data into the object
    public function __construct($username)
    {
        $this->conn = Database::getConnection();
        $this->username = $username;
        
        // Fetch the user data based on the username
        $sql = "SELECT * FROM `auth` WHERE `username` = '$username' LIMIT 1";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            
            // Populate the object properties
            $this->id = $row['id'];
            $this->email = $row['email'];
            $this->phone = $row['phone'];
            $this->blocked = $row['blocked'];
            $this->active = $row['active'];
            
            // Check if these columns exist in your DB, if not handle defaults
            $this->bio = isset($row['bio']) ? $row['bio'] : ''; 
            $this->avatar = isset($row['avatar']) ? $row['avatar'] : '';
        } else {
            throw new Exception("User not found");
        }
    }

    // 2. STATIC METHODS (Signup / Login) - Kept mostly the same
    public static function signup($Username, $Password, $email, $phone) 
    {
        $options = ['cost' => 10];
        $Password = password_hash($Password, PASSWORD_BCRYPT, $options);
        $conn = Database::getConnection();

        // Note: Added bio and avatar to schema assumption
        $sql = "INSERT INTO `auth` (`username`, `password`, `email`, `phone`, `blocked`, `active`, `bio`, `avatar`) 
        VALUES ('$Username', '$Password', '$email', '$phone', '0', '0', '', '')";

        $error = false;
        if ($conn->query($sql) === TRUE) {
            $error = false;
        } else {
            $error = $conn->error;
        }
        $conn->close();
        return $error;
    }

    public static function login($Username, $Password) 
    {
        $query = "SELECT * FROM auth WHERE username = '$Username'";
        $conn = Database::getConnection();
        $result = $conn->query($query);

        if ($result->num_rows == 1){
            $row = $result->fetch_assoc();
            if (password_verify($Password, $row['password'])) {
                return $row; // Returns Array
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    // 3. GETTERS (Accessors)
    public function getUsername() {
        return $this->username;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPhone() {
        return $this->phone;
    }

    public function getBio() {
        return $this->bio;
    }

    public function getAvatar() {
        return $this->avatar;
    }

    // 4. SETTERS (Mutators) - Updates Object AND Database
    
    // Set Email
    public function setEmail($newEmail) {
        $sql = "UPDATE `auth` SET `email` = '$newEmail' WHERE `id` = $this->id";
        if ($this->conn->query($sql)) {
            $this->email = $newEmail;
            return true;
        }
        return false;
    }

    // Set Phone
    public function setPhone($newPhone) {
        $sql = "UPDATE `auth` SET `phone` = '$newPhone' WHERE `id` = $this->id";
        if ($this->conn->query($sql)) {
            $this->phone = $newPhone;
            return true;
        }
        return false;
    }

    // Set Bio
    public function setBio($newBio) {
        // Escaping to prevent SQL errors with apostrophes
        $safeBio = $this->conn->real_escape_string($newBio);
        $sql = "UPDATE `auth` SET `bio` = '$safeBio' WHERE `id` = $this->id";
        
        if ($this->conn->query($sql)) {
            $this->bio = $newBio;
            return true;
        }
        return false;
    }

    // Set Avatar
    public function setAvatar($url) {
        $safeUrl = $this->conn->real_escape_string($url);
        $sql = "UPDATE `auth` SET `avatar` = '$safeUrl' WHERE `id` = $this->id";
        
        if ($this->conn->query($sql)) {
            $this->avatar = $url;
            return true;
        }
        return false;
    }
}
?>