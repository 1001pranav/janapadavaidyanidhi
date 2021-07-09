<?php
include 'connection.php';
session_start();
$pid=$_GET['pid'];
$name=$_GET['name'];
$_SESSION['name']=$name;
$_SESSION['pid']=$pid;
header("Location:disease.php");
?>