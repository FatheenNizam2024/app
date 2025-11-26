<?php 

include 'libs/load.php';

$username = "test002";
$password = "123456";
$result = null;

if(isset($_GET['logout'])){
    Session::destroy();
    die("Session Destroyed <a href='logintest.php'>Login Again </a>");
}

//$test = User::login($username, $password);

if (Session::get('is_loggedin')){
    $userdata = Session::get('session_user');
    $userobj = new User($userdata); // start construction of user object
    // print_r($userdata);
    // print_r($userobj);
    print("Welcome Back". $userobj->getfirstname());
    print("<br>". $userobj->getBio());
    $userobj->setBio("Updated Bio, test002");
    $userobj->setfacebook("facebook.com/test002");
    print("<br>". $userobj->getfacebook());
    $result= $userdata;
}else{
    print("No Session Found, try again");
    $result = User::login($username, $password);

    if ($result) {
        $userobj = new User($username);

    echo "Login successful!", $userobj->getUsername();
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