<?php 

    // session_start();
    // $cookie_name = "testscript";
    // $cookie_value = $_SERVER['REQUEST_URI'];
    // setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1

    // // echo __LINE__;
    // // //echo __DIR__;
 
    // // // print_r("_SERVER");
    // // // print_r($_SERVER);
    // // // print_r("_GET");
    // // // print_r($_GET);
    // // // print_r("_POST");
    // // // print_r($_POST);
    // // // print_r("_FILES");
    // // // print_r($_FILES);
    // // // print_r("_COOKIE");
    // // // print_r($_COOKIE);

    // print_r("_SESSION <br>");
    // print_r($_SESSION);

    // // if(isset($_GET['clear'])) {
    // //     session_unset(); 
    // //     print("Session cleared <br>");
    // // }

    // if(isset($_SESSION['a'])) {
    //     print("Variable a exist.... value: ($_SESSION[a]) <br>");
    // } else {
    //     $_SESSION['a'] = time();
    //     print("Assigning new variable.... value: ($_SESSION[a]) <br>");
    // }

    // if(isset($_GET['destroy'])) {
    //     session_destroy(); 
    //     print("Session destroyed <br>");
    // }

    // if(isset($_GET['decode'])){
    //     session_decode($_GET['decode']);
    //     print("Session decoded <br>");


    // }


   include 'libs/load.php';
   
   print("_SESSION <br>");
   print_r($_SESSION);

    if(isset($_GET['clear'])) {
         Session::unset(); 
         print("Session Unset <br>");
    }

    if(Session::isset('a')) {
        print("Variable already exist.... value: (".Session::get('a')."\n\n");
    } else {
        Session::set('a', time());
        print("Assigning new variable.... value: (".Session::get('a')."\n\n");
    }

    if(isset($_GET['destroy'])){
        Session::destroy(); 
        print("Session destroyed <br>");
    }



?>