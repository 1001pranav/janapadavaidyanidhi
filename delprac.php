<?php
include 'connection.php';
$pid=$_GET['pid'];
$path="SELECT paths from practioners where PID='$pid'";
$que=mysqli_query($conn,$path)or die(mysqli_error($conn));
$fetch=mysqli_fetch_assoc($que);
if($fetch['paths']!='0' or $fetch['paths']!=" "){
$file=fopen($fetch['paths'],'w+');

unlink($fetch['paths']);
}
$path="SELECT paths from disease where PID='$pid'";
$que=mysqli_query($conn,$path)or die(mysqli_error($conn));
while($fetch=mysqli_fetch_assoc($que)){
	if($fetch['paths']!='0' or $fetch['paths']!=" "){
		$file=fopen($fetch['paths'],'w+');
		unlink($fetch['paths']);
}
}
$sql="DELETE FROM practioners where PID='$pid'";
$sqld="DELETE FROM disease WHERE PID='$pid'";
$sqlt="DELETE FROM treatment WHERE PID='$pid'";
$pr=mysqli_query($conn,$sql)or die(mysqli_error($conn));
$dd=mysqli_query($conn,$sqld)or die(mysqli_error($conn));
$dt=mysqli_query($conn,$sqlt)or die(mysqli_error($conn));
if(!mysqli_error($conn))
{

echo "<script>";
echo "window.alert('Deleted Successfully');";
echo "</script>";
header('Refresh:1;url=main.html');
	}
else
{
	echo "Error in deletion";
}
mysqli_close($conn);
?>
