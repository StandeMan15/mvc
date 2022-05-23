<?php 

session_start();

if(isset($_SESSION)){

    session_destroy();

}

session_start();
$msg =  "U bent uitgelogd.";

header("Location: index.php");
?>