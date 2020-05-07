<?php
include 'connect.php';
$_SESSION['login']='';
$_SESSION['isauth']=0;
header("Location:index.php");
?>