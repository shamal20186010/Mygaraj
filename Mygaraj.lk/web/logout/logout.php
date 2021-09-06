<?php
session_start();

session_destroy(); 

session_write_close();

header("Location:/Mygaraj.lk/index.php?msg=Logout Successfully !");

die();