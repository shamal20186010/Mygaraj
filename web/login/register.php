<?php
session_start();

if (isset($_SESSION["is_login"])) {

    if ($_SESSION["is_login"]) {

        header("Location:/../Mygaraj.lk/index.php");
    }
}
?>

<title>Signup</title>
<html lang="en">

    <?php
    include "../common/heder.php";
    ?>

    <body class="text-center">
        <main class="form-signin">
            <form style="margin-top:95px;"method="post" action="/Mygaraj.lk/Sources/doRegister.php">
                <h1 class="h3 mb-3 fw-normal">Please sign up</h1><br>
                <center>   <label for="inputFirstName" class="visually-hidden">First name</label>
                <input style="width: 500px;"type="text" id="inputFirstName" class="form-control" placeholder="First name" name="inputFirstName" required autofocus>
                <label for="inputLastName" class="visually-hidden">Last name</label>
                <input style="width: 500px;"type="text" id="inputLastName" class="form-control" placeholder="Last name"name="inputLastName" required >
                <label for="inputEmail" class="visually-hidden">Email address</label>
                <input style="width: 500px;"type="email" id="inputEmail" class="form-control" placeholder="Email"name="inputEmail" required >
                <label for="inputPassword" class="visually-hidden">Password</label>
                <input style="width: 500px;"type="password" id="inputPassword" class="form-control" placeholder="Password" name="inputPassword"required >
                <label for="inputConfirmPassword" class="visually-hidden">Confirm password</label>
                <input style="width: 500px;"type="password" id="inputConfirmPassword" class="form-control" placeholder="Confirm password"name="inputConfirmPassword" required ></center>
                <br> <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button style="width: 500px;"class=" btn btn-lg btn-primary" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2021-2025</p>
            </form>
        </main>
    </body>
</html>