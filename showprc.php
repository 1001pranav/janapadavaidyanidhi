<?php
include 'connection.php';

$pid=$_GET['pid'];
$sqlp="SELECT * from  practioners where PID = '$pid' or Name  ='pid' ";
$sqlt="SELECT TID,D_names from treatment where PID = '$pid' ";
$tt=mysqli_query($conn,$sqlt);
$pr=mysqli_query($conn,$sqlp)or die(mysqli_error($conn));
$disp = mysqli_fetch_assoc($pr);
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Show Practioner</title>
  </head>
  <body>
   <div class="shadow-none p-3 mb-5 bg-light rounded">
    <h1>Flokelore Practioner Details</h1>
    <table class="table table-bordered">
   
      <?php
$num=mysqli_num_rows($pr);
if($num>0)
{   
echo "<tr><th>Name </th><td>".$disp['Name']."</td></tr>";
echo "<tr><th>Age </th><td>".$disp['Age']."</td></tr>";
echo "<tr><th>Gender </th><td>".$disp['Gender']."</td></tr>";
echo "<tr><th>Address </th><td>".$disp['Address']."</td></tr>";
echo "<tr><th>Phone Number </th><td>".$disp['Phone_no']."</td></tr>";
echo "<tr><th>District </th><td>".$disp['District']."</td></tr>";

echo "<tr><th>State</th><td>".$disp['State']."</td></tr>";
echo "<tr><th>Profession </th><td>".$disp['Profession']."</td></tr>";
echo "<tr><th>Tutor</th><td>".$disp['Tutor']."</td></tr>";
echo "<tr><th>Education</th><td>".$disp['Education']."</td></tr>";
echo "<tr><th>Experience </th><td> ".$disp['Experience']."</td></tr>";
  echo "<tr><th>Diseases Mentioned</th><td>";
  while ($trt=mysqli_fetch_assoc($tt)) {
    echo $trt['D_names'],"<br />";
  }
  echo "</td></tr>";

echo "<tr><th>Interviwer </th><td>".$disp['Interviwer']."</td></tr>";
echo " <tr><th>Date of Interview</th><td>".$disp['Date_of_Interview']."</td></tr>";
}
else
{
  echo"<center><b>NO Record Found</b></center>";
}
?>

</table>
   <nav class="navbar">
   <a class="btn btn-info btn-small" href="sdis.php">Back</a>
    <a class="btn btn-info btn-small" href="main.html">Home</a>
   <?php 
   if($num>0)
   {
   echo "<a class='btn btn-danger btn-small' href='delprac.php?pid={$pid}'>Delete Practioner</a>";
   }
    ?>
    </nav>  
   </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php
mysqli_close($conn);
?>
  </body>
</html>