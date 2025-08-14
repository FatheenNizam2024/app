<?php 

function load_template($name){
    //print("including $name.php");
    //include __DIR__."/../_templates/$name.php";
    include $_SERVER['DOCUMENT_ROOT']."/fatheen-0037/app/_templates/$name.php";
}

    function validate_credentials($username, $password){
        // This is a placeholder function. Replace with actual validation logic.
        if ($username == "Fatheen@gmail.com" && $password === '1234') {
            return true;
        }
        return false;
    }
?>

