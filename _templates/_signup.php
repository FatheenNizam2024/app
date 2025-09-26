<?php
$signup = false;
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone'])) {


    $username= $_POST['username'];
    $password= $_POST['password'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $error = signup($username, $password, $email, $phone);
    $signup = true;

}

if($signup)
{
    if (!$error){
        ?>
       <main class="container">
        <div class="bg-body-tertiary p-5 rounded mt-3">
            <h1>Signup Successful</h1>
            <p class="lead"> you have successfully registered <?php echo $username ?> </p> 
            <a class="btn btn-lg btn-primary" href="../app/login.php" role="button">click Here to Signin</a>
        </div>
    </main>
    <?php
    } else {?>
        <main class="container">
        <div class="bg-body-tertiary p-5 rounded mt-3">
            <h1>Signup failed</h1>
            <p class="lead"><?php echo $error; ?> </p> 
            <a class="btn btn-lg btn-primary" href="../app/signup.php" role="button">cTry Again</a>
        </div>
    </main>
    <?php
  }   
}
else {
    ?>
        <main class="form-signin w-100 m-auto">
    <form method="post" action="signup.php">
        <img class="mb-4" src="https://marstech.lk/wp-content/uploads/2025/03/Mars-Logo.png" alt="" width="300"
            height="300">
        <h1 class="h3 mb-3 fw-normal">Signup Here</h1>

        <div class="form-floating">
            <input name="username" type="text" class="form-control" id="floatingInput" placeholder="Type username">
            <label for="floatingInput">Username</label>
        </div>
        <div class="form-floating">
            <input name="email" type="email" class="form-control" id="floatingInput" placeholder="Type Email">
            <label for="floatingInput">Email Address</label>
        </div>
        <div class="form-floating">
            <input name="phone" type="text" class="form-control" id="floatingInput" placeholder="Type Phone Number">
            <label for="floatingInput">Phone Number</label>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-check text-start my-3">
            <input class="form-check-input" type="checkbox" value="remember-me" id="checkDefault"> <label
                class="form-check-label" for="checkDefault">
                Remember me
            </label>
        </div> <button class="btn btn-primary w-100 py-2 hvr-bounce-to-right" type="submit">Signup</button>
        <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2025</p>
    </form>
</main>
    <?php
}

?>




