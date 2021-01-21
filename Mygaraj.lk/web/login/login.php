<?php
session_start();

if (isset($_SESSION["is_login"])) {

    if ($_SESSION["is_login"]) {

        header("Location:/../Mygaraj.lk/index.php");
    }
}
?>


<!doctype html>
<html lang="en">
    <?php
    include '../common/heder.php';
    ?>
    <title>Login/signup</title>
    <br>
    <body class="text-center"style="margin-top: 50px;">
        <main class="form-signin">
            <form method="post" action="/Mygaraj.lk/Sources/doLogin.php">
                
                <h1 class="h3 mb-3 fw-normal">Please sign in</h1><br>
                <center>  <label for="inputEmail" class="visually-hidden">Email address</label>
                <input type="email" id="inEmail" name="inEmail"class="form-control" placeholder="Email address" style="width: 450px;"required autofocus >
                <label for="inputPassword" class="visually-hidden">Password</label>
                <input type="password" id="inPassword" name="inPassword" class="form-control" placeholder="Password" style="width: 450px;" required autofocus></center>
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button  style="width: 450px;"class=" btn btn-lg btn-primary" type="submit">Sign in</button>
                <br><br><br>
                <hr class="my-4">
                <p class="mt-5 mb-3 text-muted">Don't have an account yet?</p>
                <button  style="width: 400px;background-color: #6699ff;"class=" btn btn-lg btn-primary" type="button" onclick="location.href='/Mygaraj.lk/web/login/register.php'">Sign up</button>
            </form>
        </main>
    </body>
</html>
