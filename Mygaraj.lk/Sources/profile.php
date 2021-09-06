<?php
if (session_id() == '') {
    session_start();
}

include './Db_connection/Db_conn.php';
$is_login = "";
$userid = "";
if (isset($_SESSION['is_login'])) {
    $is_login = $_SESSION['is_login'];
}
if (isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
}

if ($is_login != true) {
    header("Location:/Mygaraj.lk/web/login/login.php?msg= Please Login Again!");
    die();
}

$getProfileData = "select * from users where id_user = '" . $userid . "'";

$result = $connection->query($getProfileData);

$Fname = "";
$Lname = "";
$address = "";
$contactNo = "";
$email = "";
$password = "";

if ($result->num_rows > 0) {
    if ($row = $result->fetch_assoc()) {
        $Fname = $row['firstName'];
        $Lname = $row['lastName'];
        $address = $row['address'];
        $contactNo = $row['mobile'];
        $email = $row['email'];
        $password = $row["password"];
    }
}
?>
<html lang="en">
    <?php
    include '../web/common/heder.php';
    ?>
    <title>Profile</title>
    <br><br><br>
    <center>  <div class="container"style="width: 500px;background-color: #ffffff;margin-top: -60px;"><br>
            <body class="text-center"style="background-color: #e7e7e7;">
                <main class="form-signin">
                    <form method="post" action="/Mygaraj.lk/Sources/updateProfile.php">
                        <h1 class="h3 mb-3 fw-normal">Provide your contact info</h1>
                        <label for="inputFirstName" style="margin-right:280px;">First name</label>
                        <input style="width: 400px;"type="text" id="inputFirstName" class="form-control" value="<?php echo $Fname; ?>" name="inputFirstName" autofocus><br>
                        <label for="inputLastName" style="margin-right:280px;">Last name</label>
                        <input style="width: 400px;"type="text" id="inputLastName" class="form-control" value="<?php echo $Lname; ?>"name="inputLastName" required ><br>
                        <label for="inputEmail" style="margin-right:310px;">Email</label>
                        <input style="width: 400px;"type="email" id="inputEmail" class="form-control" value="<?php echo $email ?>"name="inputEmail" required ><br>
                        <label for="inputEmail" style="margin-right:290px;">Address</label>
                        <input style="width: 400px;"type="text" id="inputAddress" class="form-control" value="<?php echo $address ?>"name="address" required ><br>
                        <label for="inputMobile" style="margin-right:300px;">Mobile</label>
                        <input style="width: 400px;"type="text" id="inputMobile" class="form-control" value="<?php echo $contactNo ?>" name="inputMobile"required ><br>
                        <label for="inputPassword" style="margin-right:300px;">Password</label>
                        <input style="width: 400px;"type="password" id="inputPassword" class="form-control" value="<?php echo $password ?>" name="inputPassword"required ><br>
                        <button style="width: 400px;"class=" btn btn-lg btn-primary" type="submit">Update</button>
                        <p class="mt-5 mb-3 text-muted">&copy; 2021-2025</p><br>    
                    </form>
                </main>
            </body>
        </div></center>
