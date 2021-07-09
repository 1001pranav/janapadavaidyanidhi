<?php
include 'connection.php';
$data="";
if(isset($_POST['dis'])){
$dis=$_POST['dis'];

{
		$sql="SELECT D_names,TID from treatment where D_names like'%$dis%'";
		$dsql=mysqli_query($conn,$sql) or die(mysqli_error($conn));
		$numr=mysqli_num_rows($dsql);
		while($row=mysqli_fetch_assoc($dsql))
		{	$tid=$row['TID'];
			$dnm=$row['D_names'];
			$data .="<a href='sdis.php?tid=$tid' class='shadow-sm '>{$dnm}</a><br/>";
		}
		if(mysqli_error($conn) ){
			$data .="no data found for{$dis}";

		}

	}	
}
echo "<div class='shadow'>".$data."</div>";

?>