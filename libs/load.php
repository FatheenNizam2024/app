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

        mysqli_report(MYSQLI_REPORT_OFF);

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
         //print ($conn);
        // Check connection
        if ($conn->connect_error) {
           // This is the line you want to see if the connection fails:
           //die("Connection lost: " . $conn->connect_error); 
           echo "connected failed";
        }
        else{
            echo "connected sucessfully   ";
        }

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
?>

