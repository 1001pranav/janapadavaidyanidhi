<?php
include "connection.php";
if (isset($_POST['pid']) and isset($_POST['tid'])) {
	$pid=$_POST['pid'];
	$tid=$_POST['tid'];
	$dis=$_POST['dis'];
	$obs=$_POST['obs'];
	$med=$_POST['med'];
	$pname=$_POST['pname'];
	$vname=$_POST['vname'];
	$sname=$_POST['sname'];
	$fdesc=$_POST['fdesc'];
	$parts=$_POST['parts'];
	$qunt=$_POST['qunt'];
	$form=$_POST['form'];
	$dur=$_POST['dur'];
	$sql="UPDATE disease SET D_name='$dis',Observation='$obs', Medicaments='$med',Plant_name='$pname',Vernacular_name='$vname',Scientific_name='$sname',Family_description='$fdesc',Parts='$parts',	Quantitiy='$qunt' ,Form='$form',Duration='$dur' WHERE PID='$pid' and TID='$tid'";
	$qur=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	if(isset($_POST['mop'])){
		$mop=$_POST['mop'];
		$moa=$_POST['moa'];
		$ind=$_POST['ind'];
		$coi=$_POST['coi'];
		$sev=$_POST['sev'];
		$com=$_POST['com'];
	$sql ="UPDATE treatment set Preperations='$moa' ,Method_of_Admin='$moa'	,Indications='$ind' ,contra_indications='$coi' ,Severity='$sev' ,comments='$com' WHERE PID='$pid' and TID='$tid'";	
	$qur=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	}
	    if(!mysqli_error($conn)){
        echo "<center><b>Update Success</b></center>";
        header("refresh:1;url=showp.php?phn=$phn");
    }
    else
    {
        echo "<b><center>There was a mistake please try again</center></b>";
        
    }

}


?>