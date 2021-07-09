<?php
include 'connection.php';
function redirect($page)
{
	header('refresh:1;url='.$page);
}
if (isset($_GET['tid'])and isset($_GET['pid'])) 
{$tid=$_GET['tid'];
$pid=$_GET['pid'];
$path="SELECT paths from disease where PID='$pid'";
$que=mysqli_query($conn,$path)or die(mysqli_error($conn));
while($fetch=mysqli_fetch_assoc($que)){
	if($fetch['paths']!='0' or $fetch['paths']!=" "){
		$file=fopen($fetch['paths'],'w+');
		unlink($fetch['paths']);
}
}
$sql1="DELETE FROM disease where TID='$tid' and PID='$pid'";
$sql2="DELETE FROM treatment where TID='$tid' and PID='$pid'";
$del2=mysqli_query($conn,$sql1);
$del1=mysqli_query($conn,$sql2)or die(mysqli_error($conn));
if(mysqli_error($conn))
{
	echo mysqli_error($conn);
}
else
{

echo "<script>";
echo "window.alert('Deleted Successfully')";
echo "</script>";
if(isset($_GET['edit']))
{
	redirect('edit.php?pid='.$pid);
}
else
{
	redirect('main.html');
}
}
}
mysqli_close($conn);

?>