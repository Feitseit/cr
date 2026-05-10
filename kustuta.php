<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include("config.php");
$paring = "DELETE FROM cars WHERE id = ".$_GET['id']."";
$valjund = mysqli_query($yhendus, $paring);

if($valjund){
    header("Location:admin.php");
}

?>