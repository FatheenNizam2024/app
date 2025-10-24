

    <?php 

    // $pass = isset($_GET['pass']) ? $_GET['pass'] : 'HelloWorld123!'; // ternary operator - to get 'pass' parameter or default value
    // $Password = md5($pass) . "<br>";
    // echo $Password;

    $str = "password123456789";

    echo ("Data Length: " . strlen($str) . "\n");

    $md5 = md5($str);
    $md5len = strlen($md5);

    $b64 = base64_encode($str);
    $b64len = strlen($b64);

    echo("MD5: $md5 (length: $md5len)\n"); // security through obsecurity
    echo("Base64: $b64 (length: $b64len)\n");


    ?>
   