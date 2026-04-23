<?php   
session_start();
$_SESSION['oturum']="kapali"; 
header("Location: ../index.php")
?>