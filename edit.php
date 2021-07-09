<?php
include 'connection.php';
$null=1;
if(isset($_GET['pid']))
{
	$pid=$_GET['pid'];
	$pquery="SELECT TID,D_name,Medicaments,Observation from disease where PID='$pid'";
	$plants=mysqli_query($conn,$pquery)or die(mysqli_error($conn));
}
else{$null=0;}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style type="text/css">
    	label{
    		font-weight: bold;
    	}
    </style>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Edit Plant Data</title>

</head>
<body>
	<center><h4>Edit plant data</h4></center>
	<h6>Edit one at a time and update</h6>

<?php
if ($null) {
	$dis="";
	while($pdt=mysqli_fetch_assoc($plants))
    {   
    	$tid=$pdt['TID'];
       	if($dis!=$tid){
       		$dis=$tid;
            $dname=$pdt['D_name'];
       		$obs=$pdt['Observation'];
       		$medic=$pdt['Medicaments'];
       		$tquery="SELECT * FROM treatment WHERE PID='$pid' AND TID='$tid'";
       		$treat=mysqli_query($conn,$tquery)or die(mysqli_error($conn));
            
       		$psql="SELECT Plant_name,Vernacular_name,Scientific_name,Family_description,Parts,Quantitiy,Form,Duration,paths from Disease where PID='$pid' and TID='$tid'";
            $plnt=mysqli_query($conn,$psql) or die(mysqli_error($conn));
            
            echo "<form method='post' action='update.php'>";
            echo '<div class="form-group row">';
            echo "<div class='container'>";
         
            echo '<input type="hidden" value="{$pid}" name="pid">';
            echo '<input type="hidden" value="{$did}" name="did">';
            echo '<input type="hidden" value="{$tid}" name="tid">';
            echo "<label > Disease Name :<input type='text' value='{$dname}' class='form-control' name='dis'></label>";
            echo "<label> Symptoms/Observations: <input type='text' class='form-control' value='{$obs}' name='obs'></label>";
            echo "<label> Type of Medicaments:<input type='text'class='form-control' value='{$medic}' name='med'></label><br/>";
            echo "<table class='table table-bordered'>";
            echo "<tr><th>Plant Name</th><th>Vernacular Name</th><th>Family description</th><th>Parts</th><th>form</th><th>Duration</th></tr>";
            while($plt=mysqli_fetch_assoc($plnt)){
            	$pname=$plt['Plant_name'];
            	$vname=$plt['Vernacular_name'];
            	$sname=$plt['Scientific_name'];
            	$fdesc=$plt['Family_description'];
            	$parts=$plt['Parts'];
            	$form=$plt['Form'];
            	$qunt=$plt['Quantitiy'];
            	$dur=$plt['Duration'];
            	echo "<tr><td><input type='text'  value='{$pname}' name='pname'></td>";
            	echo "<td><input type='text'  value='{$vname}' name='vname'></td>";
            	echo "<td><input type='text'  value='{$sname}' name='sname'></td>";
            	echo "<td><input type='text'  value='{$fdesc}' name='fdesc'></td>";
            	echo "<td><input type='text'  value='{$parts}' name='parts'></td>";
            	echo "<td><input type='text'  value='{$qunt}' name='qunt'></td></tr>";
            	echo "<td><input type='text'  value='{$form}' name='form'></td>";
            	echo "<td><input type='text'  value='{$dur}' name='dur'></td></tr>";
            }
            echo"</table>";
            while($arr=mysqli_fetch_assoc($treat))
            {	
            	$mop=$arr['Preperations'];
            	$moa=$arr['Method_of_Admin'];
            	$ind=$arr['Indications'];
            	$coi=$arr['contra_indications'];
            	$sev=$arr['Severity'];
            	$com=$arr['comments'];
 				echo "<label> Method of Preparation<textarea class='form-control' name='mop'>{$mop}</textarea></label> ";
	
 				echo "<label> Method Of Administration <textarea class='form-control' name='moa'>{$moa}</textarea></label>";
	
 				echo "<label> Indications <textarea class='form-control' name='ind'>{$ind}</textarea></label>";
	
 				echo "<label>Contra Indications<textarea class='form-control' name='coi'>{$coi}</textarea></label>";

 				echo "<label> Severity<textarea class='form-control' name='sev'>{$sev}</textarea></label>";
	
 				echo "<label>Comments<textarea class='form-control' name='com'>{$com}</textarea></label>";
		

            }
		 echo "<nav class='navbar'><br><button type='submit' class='btn btn-success'>Update</button>";
		 echo "<a href='deldis.php?tid={$tid}&pid={$pid}&edit=1' class='btn btn-danger'>Delete</a></nav>";
        }

        echo "</div></div></form>";
    }
echo '<nav class="navbar">';
echo '<a href="showp.php?pid={$pid} "class="btn btn-outline-warning">Back</a>';

}
echo '<a href="main.html"  class="btn btn-outline-primary">Home</a>';
echo '</nav>';
mysqli_close($conn);
?>



</nav>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
