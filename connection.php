<?php

$lhost="localhost";
$dbuser="root";
$dbpass="";
$dbname="flokeloredb";
$conn=mysqli_connect($lhost,$dbuser,$dbpass,$dbname)or die(mysqli_connect_error($conn));
?>