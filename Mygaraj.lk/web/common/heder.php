<?php
if (session_id() == '') {
    session_start();
}

$is_login = false;
$user_type = "";
if (isset($_SESSION['is_login'])) {
    $is_login = $_SESSION['is_login'];
}
?>  

<base href ="http://localhost/Mygaraj.lk/">

<link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/starter-template/">
<!-- Bootstrap core CSS -->
<link href="web/assets/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }
</style>


<!-- Custom styles for this template -->
<link href="web/assets/starter-template.css" rel="stylesheet">


<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="/Mygaraj.lk/index.php">Mygaraj.lk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item active">
                    <a class="nav-link" aria-current="page" href="/Mygaraj.lk/index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="false">Category</a>
                    <ul class="dropdown-menu" aria-labelledby="dropdown01">
                        <li><a class="dropdown-item" href="#">Engine</a></li>
                        <li><a class="dropdown-item" href="#">Battery</a></li>
                        <li><a class="dropdown-item" href="#">Tayar</a></li>
                        <li><a class="dropdown-item" href="#">Light</a></li>
                    </ul>
                </li>
                <ul></ul><ul></ul><ul></ul>
                <form class="d-flex"  method="POST" action="/Mygaraj.lk/Sources/AdvancedSearch.php">
                    <input class="form-control me-2" type="search" placeholder="Search"name="Search" aria-label="Search"style="width: 500px;">
                    <button class="btn btn-outline-success" type="submit"style="width: 160px;">Search</button>
                </form>
            </ul>
            <ul class="navbar-nav  mb-2 mb-md-0"style="">
                <li class="nav-item">
                    <form class="d-flex">
                        <?php
                        if ($is_login) {
                            ?>
                            <table>
                                <tr><td><button type="button" class="btn btn-info" onclick="location.href='/Mygaraj.lk/Sources/cart.php'">Cart+</button></td>
                                    <td><button class="btn btn-primary" type="button"onclick="location.href = '/Mygaraj.lk/Sources/profile.php'">Profile</button></td>
                                    <td><button class="btn btn-primary" type="button"onclick="location.href = '/Mygaraj.lk/web/logout/logout.php'">Logout</button></td>
                                </tr>
                            </table>
                            <?php
                        } else {
                            ?>
                            <button class="btn btn-primary" type="button"onclick="location.href = '/Mygaraj.lk/web/login/login.php'">Login/Signup</button>
                            <?php
                        }
                        ?>
                    </form>
                </li>
            </ul>

        </div>
    </div>
</nav>
  <?php
            if(isset($_GET['msg'])){
                ?>
            <p  style="color: red;" align="center"><?php echo $_GET['msg'];?></p>
            <hr>
            <?php
} 
            ?>

          