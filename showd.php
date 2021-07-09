<?php
include 'connection.php';
$tid=$_GET['tid'];
$pid=$_GET['pid'];

$sqld="SELECT * from disease where TID='$tid' and PID='$pid'";
$sqlp="SELECT PID,Name from  practioners where PID='$pid' ";
$sqlt="SELECT * from treatment where TID='$tid' and PID='$pid'";
$pr=mysqli_query($conn,$sqlp)or die(mysqli_error($conn));
$ds=mysqli_query($conn,$sqld)or die(mysqli_error($conn));
$tt=mysqli_query($conn,$sqlt)or die(mysqli_error($conn));
$disp = mysqli_fetch_assoc($pr);
$dist = mysqli_fetch_assoc($tt);

?>

<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Disease Details</title>
  </head>
  <body>
    <div class="shadow-none p-3 mb-5 bg-light rounded">
   
      <?php
      $col=1;
      echo"<table class='table table-bordered'>";
          
      $pid=$disp['PID'];
      
      while($row = mysqli_fetch_assoc($ds))
{
    if($col==1)
    {
      $tid=$row['TID'];
      echo "<tr><th>Disease Name</th><td>{$dnames}</td></tr>";
      $col=0;
    }
  echo "<tr><th>Plant name </th><td>".$row['Plant_name']."</td></tr>";
  echo "<tr><th>Vernacular name </th><td>".$row['Vernacular_name']."</td></tr>";
echo "<tr><th>Scientific name </th><td>".$row['Scientific_name']."</td></tr>";
  echo "<tr><th>Parts Used </th><td>".$row['Parts']."</td></tr>";
    echo "<tr><th>Quantity </th><td>".$row['Quantitiy']."</td></tr>";
    echo "<tr><th>Form</th><td>".$row['Form']."</td></tr>";
    echo "<tr><th>Duration </th><td>".$row['Duration']."</td></tr>";

  $pts=$row;
} 

echo "<tr><th>Medicaments</th><td>".$pts['Medicaments']."</td></tr>";



echo "<tr><th>Preperation </th><td>".$dist['Preperations']."</td></tr>";
echo "<tr><th>Method Of Administration </th><td>".$dist['Method_of_Admin']."</td></tr>";
echo "<tr><th>Indications </th><td>".$dist['Indications']."</td></tr>";

echo "<tr><th>Contra Indication  </th><td>".$dist['contra_indications']."</td></tr>";

echo "<tr><th>Severity </th><td>".$dist['Severity']."</td></tr>";
echo "<tr><th>Other Infomation </th><td>".$dist['comments']."</td></tr>";
echo"</table>";

$pid=$dist['PID'];
$tid=$dist['TID'];
?>   

   
    <nav class="navbar">
    <a class="btn btn-info btn-small" href="main.html">Back</a>
    
    <?php
   
    echo "<a href='deldis.php?pid={$pid}&tid={$tid}'class='btn btn-danger btn-small'>Delete Disease</a>";
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