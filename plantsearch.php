<?php
include 'connection.php';

if (isset($_POST['click'])) {
	$data=array();
	if ($_POST['click']=='Display' or empty($_POST['dname'])) 
	{	
	  	$sqlp="SELECT  practioners.PID as pid,practioners.Name as name,practioners.District as dist,disease.TID as tid,disease.D_name as D_name , disease.Scientific_name as Scientific_name, disease.Plant_name as Plant_name, disease.Vernacular_name as Vernacular_name, disease.Family_description as Family_description from  disease, practioners Where practioners.PID=disease.PID ORDER BY Scientific_name";

	  	$ds=mysqli_query($conn,$sqlp)or die(mysqli_error($conn));

	}
	elseif ($_POST['search']=='Dist') {
			$dname=$_POST['dname'];
		$search=$_POST['search'];
		$sql="SELECT  practioners.PID as pid,practioners.Name as name,practioners.District as dist,practioners.Phone_no as Phone_no,disease.TID as tid,disease.D_name as D_name , disease.Scientific_name as Scientific_name, disease.Plant_name as Plant_name, disease.Vernacular_name as Vernacular_name, disease.Family_description as Family_description from  disease, practioners  where practioners.District LIKE '%$dname%' and practioners.PID=disease.PID ORDER BY Scientific_name ";
	
		$ds=mysqli_query($conn,$sql)or die(mysqli_error($conn));
		
	}
	else
	{
	$data=array();
		
		$dname=$_POST['dname'];
		$search=$_POST['search'];
		$sql="SELECT  practioners.PID as pid,practioners.Name as name,practioners.District as dist,disease.Phone_no as Phone_no,disease.TID as tid,disease.D_name as D_name , disease.Scientific_name as Scientific_name, disease.Plant_name as Plant_name, disease.Vernacular_name as Vernacular_name, disease.Family_description as Family_description from  disease, practioners  where $search LIKE '%$dname%' and practioners.PID=disease.PID ORDER BY Scientific_name ";
	
		$ds=mysqli_query($conn,$sql)or die(mysqli_error($conn));
		
		
	}
	 while($row = mysqli_fetch_assoc($ds))
	    { 

	     $data[]=$row;
	    }
	    echo json_encode($data);

}  
?>