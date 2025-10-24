<?php
$signup = false;
if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['phone'])) {


        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $error = User::signup($username, $password, $email, $phone);
        $signup = true;

}

if ($signup) {
        if (!$error) { ?>

                <main class="container">
                        <div class="bg-body-tertiary p-5 rounded mt-3">
                                <h1>Singup Successful </h1>
                                <p class="lead"></p> <a
                                        class="btn btn-lg btn-primary" href="../app/login.php" role="button">Now You Can Login Here</a>
                        </div>
                </main>
                <?php
        } else { ?>
                <main class="container">
                        <div class="bg-body-tertiary p-5 rounded mt-3">
                                <h1>Singup Failed </h1>
                                <p class="lead"><?php echo $error; ?></p> <a
                                        class="btn btn-lg btn-primary" href="../app/signup.php" role="button">Try Again</a>
                        </div>
                </main>
        
<?php
} 
} else  { ?><main class="form-signin w-100 m-auto">
        <form method="post" action="signup.php"> <img class="mb-4"
                        src="https://marstech.lk/wp-content/uploads/2025/03/Mars-Logo.png" alt="" width="300">
                <h1 class="h3 mb-3 fw-normal">signup here</h1>



                <div class="form-floating"> <input name="username" type="text" class="form-control" id="floatingInput"
                                placeholder="type username"> <label for="floatingInput">username</label> </div>
                <div class="form-floating"> <input name="email" type="email" class="form-control" id="floatingInput"
                                placeholder="type email"> <label for="floatingInput">email address</label> </div>
                <div class="form-floating"> <input name="phone" type="text" class="form-control" id="floatingInput"
                                placeholder="type phone number"> <label for="floatingInput">phone</label> </div>
                <div class="form-floating"> <input name="password" type="password" class="form-control"
                                id="floatingPassword" placeholder="Password"> <label
                                for="floatingPassword">Password</label> </div>
                <div class="form-check text-start my-3"> <input class="form-check-input" type="checkbox"
                                value="remember-me" id="checkDefault"> <label class="form-check-label"
                                for="checkDefault">
                                Remember me
                        </label> </div> <button class="btn btn-primary w-100 py-2 hvr-wobble-bottom"
                        type="submit">Signup</button>
                <p class="mt-5 mb-3 text-body-secondary">&copy; 2017–2025</p>
        </form>
</main>
<?php
}
?>