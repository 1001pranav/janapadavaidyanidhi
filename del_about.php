<?php  
include 'connection.php';
if(isset($_GET['aid'])){
	$aid=$_GET['aid'];
	$path="SELECT paths from aboutus where A_ID='$aid'";
	$que=mysqli_query($conn,$path)or die(mysqli_error($conn));
	$fetch=mysqli_fetch_assoc($que);
	if($fetch['paths']!='0' or $fetch['paths']!=" "){
		$file=fopen($fetch['paths'],'w+');
		unlink($fetch['paths']);
	}
	$sql="DELETE from aboutus where A_ID='$aid'";
	$que=mysqli_query($conn,$sql)or die(mysqli_error($conn));
if(!mysqli_error($conn))
{

echo "<script>";
echo "window.alert('Deleted Successfully');";
echo "</script>";
header('Refresh:1;url=aboutus.php');
	}
else
{
	echo "Error in deletion";
}

}

mysqli_close($conn);
?>