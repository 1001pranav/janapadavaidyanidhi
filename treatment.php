<?php 
include 'connection.php';
session_start();

$phone=$_SESSION['phone'];
$dname=$_SESSION['dname'];

$proc=$_POST['proc'];
$moa=$_POST['moa'];
$indi=$_POST['indi'];
$contra=$_POST['contra'];
$sev=$_POST['sev'];
$oi=$_POST['oi'];


if (isset($proc)) {
		if(!empty($_POST['d_name']))
		{	
		$dname=$_POST['d_name'];
		}
	$sql = "INSERT INTO treatment (Phone_no, D_names, Preperations, Method_of_Admin, Indications, contra_indications, Severity, comments) VALUES ('$phone', '$dname','$proc', '$moa','$indi','$contra','$sev','$oi')";
	$r1=mysqli_query($conn,$sql)or die(mysqli_error($conn)) ;
	
	header("Refresh:3;url=treatments.php");
}

mysqli_close($conn);
?>
