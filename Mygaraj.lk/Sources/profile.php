

<html lang="en">
    <?php
    include '../web/common/heder.php';
    include './Db_connection/Db_conn.php';
    ?>
    <title>Profile</title>
    <br><br><br>
     <?php
                $sql = "SELECT * FROM mygaraj.users;";
                $result = $connection->query($sql);

                if ($row = $result->fetch_assoc()) {

                   }
                    ?>
    <center>  <div class="container"style="width: 500px;background-color: #ffffff;margin-top: -60px;"><br>
            <body class="text-center"style="background-color: #e7e7e7;">
        <main class="form-signin">
            <form method="post" action="/Mygaraj.lk/Sources/doRegister.php">
                <h1 class="h3 mb-3 fw-normal">Provide your contact info</h1>
                <label for="inputFirstName" style="margin-right:280px;">First name</label>
                    <input style="width: 400px;"type="text" id="inputFirstName" class="form-control" value="<?php echo $row["firstName"] ?>" name="inputFirstName" autofocus><br>
                    <label for="inputLastName" style="margin-right:280px;">Last name</label>
                    <input style="width: 400px;"type="text" id="inputLastName" class="form-control" value="<?php echo $row["lastName"] ?>"name="inputLastName" required ><br>
                    <label for="inputEmail" style="margin-right:310px;">Email</label>
                    <input style="width: 400px;"type="email" id="inputEmail" class="form-control" value="<?php echo $row["email"] ?>"name="inputEmail" required ><br>
                    <label for="inputEmail" style="margin-right:290px;">Address</label>
                    <input style="width: 400px;"type="text" id="inputAddress" class="form-control" value="<?php echo $row["address"] ?>"name="address" required ><br>
                    <label for="inputPassword" style="margin-right:300px;">Mobile</label>
                    <input style="width: 400px;"type="text" id="inputMobile" class="form-control" value="<?php echo $row["mobile"] ?>" name="inputPassword"required ><br>

                    <button style="width: 400px;"class=" btn btn-lg btn-primary" type="submit">Update</button>
                    <p class="mt-5 mb-3 text-muted">&copy; 2021-2025</p><br>    
            </form>
        </main>
    </body>
        </div></center>
   