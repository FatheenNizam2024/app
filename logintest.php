<?php 

include 'libs/load.php';

$username = "root2";
$password = "root123";
$result = null;

if(isset($_GET['logout'])){
    Session::destroy();
    die("Session Destroyed <a href='logintest.php'>Login Again </a>");
}

//$test = User::login($username, $password);

if (Session::get('is_loggedin')){
    $userdata = Session::get('session_user');
    print_r($userdata);
    print("Welcome Back $username");
    $result= $userdata;
}else{
    print("No Session Found, try again");
    $result = User::login($username, $password);

    if ($result) {
    echo "Login successful!, $result[username]\n";
    Session::set('is_loggedin', true);
    Session::set('session_user', $result);
    } else {
        echo "Login failed";
    } 
}

echo <<< EOL
<br><br><a href ="logintest.php?logout">Logout</a>
EOL



?>