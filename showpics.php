<?php
include 'connection.php';
$null=0;
session_start();
if (isset($_GET['tid'])) {
	$tid=$_GET['tid'];
	$sql="SELECT * from paths where TID='$tid'";
    $tidq=mysqli_query($conn,$sql); 
    $null=1;

}
?>
<!doctype html>
<html lang="en">
  <head>
  	<style type="text/css">
  	#img{
      position: absolute;
      top: 0%;
      right: 0px;
      width: 12%;
      }
    #top{
      width:10%;
    }
  	</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 

integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Images Or Videos</title>
  </head>
  <body>
  	<nav class="navbar navbar-light navbar-expand-sm">
  		<a href='main.html'><img src="SDMPCA.jpg" id='top'></a>
  		<img src="sdm.png"  align='top right' id='img'>
  	</nav>
  	<div class="container">
	   <?php
	   while ($row=mysqli_fetch_assoc($tidq)) {
	   	$path=$row['paths'];
		$name=$row['Name'];
		$desp=$row['Description'];

	   	if($row['Type']=='Images'){
	   		echo "<figure class='figure'>";
	   		echo "<img src='$path' class='figure-img img-fluid rounded' alt='Error in fetching Image of $name'>";
	   		echo "<figcaption class='figure-caption'>$name $desp</figcaption>";
	   		echo "</figure>";
	   	}
	   	else {
	   		echo "<figure class='figure'>";
	   		echo "<video controls>";
	   		echo "<source src='$path'>";
	   		echo "Your browser does not support the video tag. or Unable to fetch file";
	   		echo "</video>";
	   		echo "<figcaption class='figure-caption'>$name $desp</figcaption>";
	   		echo "</figure>";
	   	}
	   }

	   ?>
	</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X

+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-

UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-

JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>