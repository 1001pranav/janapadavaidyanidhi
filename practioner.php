<?php
include 'connection.php';
$data=array();
if(isset($_POST['show']))
{
	$sql="SELECT practioners.PID as pid,practioners.Phone_no as phone, practioners.Name as name,practioners.District as dist,practioners.Address as adds, practioners.State as state from practioners ";
	$query=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	while ($row=mysqli_fetch_assoc($query)) {
		$data[]=$row;

	}
	echo json_encode($data);
}
?>