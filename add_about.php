<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add About Us</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<style type="text/css">
		.container{
			border:solid 2px darkcyan;
			background-image: linear-gradient(thistle,violet,fuchsia,darkmagenta);
		}
		body{
			background-image: repeating-radial-gradient(yellowgreen,greenyellow,lawngreen);
		}
		.row{
			border-bottom: solid 2px darkcyan;
		}
	</style>

</head>
<body>
	<div class="none" >
		<div class='col col-12'>
			<h1>Editing About Us</h1>
		</div>
	</div>
<form action='add_about.php' method='post' enctype="multipart/form-data">	
	<div class="container pt-4">
		<div class="row  form-group">
			<div class="col col-md-3 col-sm-2 px-2 order-sm-first">
				<label>Image: <input type='file' class='form-control' name='photo[]'></label>
				<h6> Note: Image size Should be less than 2px </h6>
			</div>
			<div class='col col-md-4 px-3 col-sm-5'>
				<label>Name : <input type='text' class='form-control' name='name[]'></label>
			</div>	
			<div class="col col-md-5 col-sm-5 order-sm-last">
				<label>Description :<textarea name='desc[]' class='form-control'></textarea></label>
			</div>	
		</div>
		<div id='res'>
		</div>
		<button type="button" id="add" class="btn btn-sm btn-success">+</button>
		<nav class="navbar">
			<a href="Aboutus.php" class="btn btn-primary"> Back</a>
		<button  type="submit" class="btn btn-outline-success">Submit</button>
		</nav>
	</div>

</form>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script type="text/javascript">
	$(document).ready(function(){
		count=1;
		$('#add').on('click',function(){
			html="<div class='row."+count+"'>";
			html +="<div class='row form-group'>";
			html +="<div class='col col-md-3 col-sm-2 px-2 order-first order-sm-first'>"
			html +="<label>Image: <input type='file' class='form-control' name='photo[]'></label></div>"
			html +="<div class='col col-md-4 px-3 col-sm-5 '>";
			html +="<label>Name : <input type='text' class='form-control' name='name[]'></label>";
			html +="</div><div class='col col-md-5 col-sm-5 order-sm-last'>";
			html +="<label>Description :<textarea name='desc[]' class='form-control'></textarea></label></div></div>"
			
			html +="</div>"
			count++;
			$('#res').append(html);
		})
	});
</script>
</body>
</html>
<?php
if(isset($_POST['name'])){
	$name=$_POST['name'];
	$desc=$_POST['desc'];
	for ($count=0; $count < sizeof($name); $count++) { 
		$ncnt=$name[$count];
		$dcnt=$desc[$count];
	    $maxsize = 2 * 1024 * 1024;
		$fsize=$_FILES['photo']['size'][$count];
		if ($fsize > $maxsize)          
	    {
	        die("Error: File size is larger than the allowed limit.");
	    }
	    $sql="INSERT INTO aboutus (Name, Description) values('$ncnt','$dcnt')";
	    $query=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	    $sql="SELECT A_ID from aboutus order by A_ID DESC limit 1";
	    $query=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	    $row=mysqli_fetch_assoc($query);
		$fname=$_FILES['photo']['name'][$count];
	    $ftype=$_FILES['photo']['type'][$count];
	    $fsize=$_FILES['photo']['size'][$count];
	    $ext = pathinfo($fname, PATHINFO_EXTENSION);
	    $fn=$ncnt."_".$row['A_ID'];
	    if ($fsize > $maxsize)          
	    {
	        die("Error: File size is larger than the allowed limit.");
	    }
	    move_uploaded_file($_FILES["photo"]["tmp_name"][$count],"aus/".$fn.".".$ext); 
	    $path="aus/".$fn.".".$ext;
	    $aid=$row['A_ID'];
	    $sql="UPDATE aboutus SET paths='$path'WHERE A_ID='$aid'";
	    $query=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	}
}
?>