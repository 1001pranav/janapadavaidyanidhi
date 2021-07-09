<?php 
include 'connection.php';
$pid=$_GET['pid'];
$did=$_GET['did'];
$sql="SELECT * FROM disease WHERE Phone_no='$pid' AND did='$did' ";
$que=mysqli_query($conn,$sql) or die(msqli_error($conn));
$res = mysqli_fetch_assoc($que);
?>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Show Plant Details</title>
  </head>
  <body>
   <div class="container-fluid">
    <h1>Plant Details</h1>
    
      <?php
                  $num=mysqli_num_rows($que);
if($num>0)
{   
      echo "<div class='row'>";
      echo "<div class='col col-sm>'";
      echo "<b>Plant Name</b>";
      echo "</div><div class='col-md-auto'>";
      echo $res['Plant_name'];
      echo "</div></div>";

     echo "<div class='row'>";
      echo "<div class='col col-sm>'";
      echo "<b>Vernacular Name</b>";
      echo "</div><div class='col-md-auto'>";
      echo $res['Vernacular_name'];
      echo "</div></div>";

      echo "<div class='row'>";
      echo "<div class='col col-sm>'";
      echo "<b>Scientififc Name</b>";
      echo "</div><div class='col-md-auto'>";
      echo $res['Scientififc_name'];
      echo "</div></div>";

      
      echo "<div class='row'>";
      echo "<div class='col col-sm>'";
      echo "<b>Family Description</b>";
      echo "</div><div class='col-md-auto'>";
      echo $res['Family_description'];
      echo "</div></div>";
      
      echo "<div class='row'>";
      echo "<div class='col col-sm>'";
      echo "<b>Part Used</b>";
      echo "</div><div class='col-md-auto'>";
      echo $res['Parts'];
      echo "</div></div>";

      echo "<div class='row'>";
      echo "<div class='col col-sm>'";
      echo "<b>Quantity</b>";
      echo "</div><div class='col-md-auto'>";
      echo $res['Quantity'];
      echo "</div></div>";

      echo "<div class='row'>";
      echo "<div class='col col-sm>'";
      echo "<b>Form</b>";
      echo "</div><div class='col-md-auto'>";
      echo $res['Form'];
      echo "</div></div>";

      echo "<div class='row'>";
      echo "<div class='col col-sm>'";
      echo "<b>Duration</b>";
      echo "</div><div class='col-md-auto'>";
      echo $res['Duration'];
      echo "</div></div>";
}
else
{
    echo "<center><b>NO Plant Record Found</b></center>";
}
      ?>
   </div>

   <nav class="navbar">
    <a class="btn btn-info btn-small" href="sdis.php">Back</a>
    <a class="btn btn-primary btn-small " href="main.html">Home</a>
    </nav>  
   
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <?php
mysqli_close($conn);
?>
  </body>
</html>


  

