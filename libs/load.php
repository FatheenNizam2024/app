<?php 

function load_template($name){
    //print("including $name.php");
    //include __DIR__."/../_templates/$name.php";
    include $_SERVER['DOCUMENT_ROOT']."/fatheen-0037/app/_templates/$name.php";
}   

    

    // function validate_credentials($username, $password){
    //     // This is a placeholder function. Replace with actual validation logic.
    //     if ($username == "Fatheen@gmail.com" && $password === '1234') {
    //         return true;
    //     }
    //     return false;
    // }


    function signup ($Username, $Password, $email, $phone){
        
        $servername = "localhost";
        $username = "fatheen-0037";
        $password = "200224501451";
        $dbname = "fatheen_newdb";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
         //print ($conn);
        // Check connection
        if ($conn===false) {
           echo "connected failed";
        }
        else{
            echo "connected sucessfully";
        }

        $sql = "INSERT INTO `auth` (`id`, `username`, `password`, `email`, `phone`, `blocked`, `active`) 
        VALUES (NULL, '$Username', '$Password', '$email', '$phone', '0', '0')";

        $result = false;

        if ($conn->query($sql) === TRUE) {
        $result = false;
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        $result = false;
        }

        $conn->close();

        return $result;
    }
?>

