<?php
include 'connection.php';
if (isset($_GET['tid'])and isset($_GET['pid'])) {

  $tid=$_GET['tid'];
  $pid=$_GET['pid'];
  $sqld="SELECT Plant_name,Vernacular_name,Scientific_name,Family_description,Parts,Quantitiy,Form,Duration,paths from disease where TID='$tid' and PID='$pid'";
  $sqlp="SELECT PID,Name from  practioners where PID='$pid' ";
  $sqlt="SELECT * from treatment where TID='$tid' and PID='$pid'";
  $pquery="SELECT D_name,Medicaments,Observation from disease where PID='$pid' and TID='$tid'";
  $plants=mysqli_query($conn,$pquery)or die(mysqli_error($conn));
  $pr=mysqli_query($conn,$sqlp)or die(mysqli_error($conn));
  $plnt=mysqli_query($conn,$sqld)or die(mysqli_error($conn));
  $treat=mysqli_query($conn,$sqlt)or die(mysqli_error($conn));
  $disp = mysqli_fetch_assoc($pr);
  $null=1;
  $pdt=mysqli_fetch_assoc($plants);
  $dname=$pdt['D_name'];
}
else{
  $null=0;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <style type="text/css">
      .container{
        background-image: url('SDMPCA1.png');
        background-size: 100% 100%;
        background-repeat: no-repeat;
        border-radius: 25px;

      }
      img{
        width: 150px;
      }
     h3{
      text-align: center;

     }
     .left{
      position: absolute;
      right:0px;
      top: 0px;
     
     }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Disease Details</title>
  </head>
  <body>


<a href="main.html" ><img src="SDMPCA.jpg"></a>
<h3>Disease Details for <?php if(!null) {echo $dname;}  ?></h3>
<a href="main.html" class="left"><img src="sdm.png"></a>
    <div class="jumbotron">
      <div class="container">
        <?php
        if($null){
          
          echo"<table class='table table-bordered shadow-md'>";
          echo "<tr><th>Name </th><td><a href='showprc.php?pid={$disp['PID']}'>".$disp['Name']."</a></td></tr>";
          
          
          echo "<th colspan=2 id='fnt'><center>Infomation about Plant for {$dname}</center></th>";
          echo "<tr><th>Symptoms/ Observation</th><td>{$pdt['Observation']}</td></tr>";
          echo "<tr><th>Medicaments</th><td>{$pdt['Medicaments']}</td></tr>";
          echo "</table>";
          echo "<table class='table table-bordered'>";
          echo '<tr><th> Plant Name</th><th>Vernacular Name</th><th>Scientific Name</th><th>Family Description</th><th>part Used</th><th>Quantity</th><th>Form</th><th>Duration</th><th>Plant Image</th></tr>';
           while($plt=mysqli_fetch_assoc($plnt))
            {
              $path=$plt['paths'];
              
              echo "<tr><td>{$plt['Plant_name']}</td>";
              echo "<td>{$plt['Vernacular_name']}</td>";
              echo "<td>{$plt['Scientific_name']}</td>";
              echo "<td>{$plt['Family_description']}</td>";
              echo "<td>{$plt['Parts']}</td>";
              echo "<td>{$plt['Quantitiy']}</td>";
              echo "<td>{$plt['Form']}</td>";
              echo "<td>{$plt['Duration']}</td>";
              echo "<td><img src='$path' alt='Image not found'id='small'></img></td></tr>";
            }
            echo  "</table>";
            while($arr=mysqli_fetch_assoc($treat))
            {
            
              echo "<table class='table table-bordered shadow-md'>";
              echo "<th colspan=2 id='fnt'><center>Treatment for {$dname}</center></th>";
              echo  "<tr><th>Disease Name</th><td>{$arr['D_names']}</td></tr>";
              echo  "<tr><th>Method of Preparation</th><td>{$arr['Preperations']}</td></tr>";
              echo  "<tr><th>Method Of Administration</th><td>{$arr['Method_of_Admin']}</td></tr>";
              echo  "<tr><th>Indications</th><td>{$arr['Indications']}</td></tr>";
              echo  "<tr><th>Contra Indications</th><td>{$arr['contra_indications']}</td></tr>";
              echo  "<tr><th> Severity</th><td>{$arr['Severity']}</td></tr>";
              echo  "<tr><th> Comments</th><td>{$arr['comments']}</td></tr>";
              echo "</table>";
            }

        }   
        ?>   
      </div>
   </div>
    <nav class="navbar fixed-bottom">
   
    <a class="btn btn-outline-primary btn-small " href="main.html">Home</a>
    <?php
    if ($null){
            echo "<a class='btn btn-outline-danger btn-small' href='deldis.php?tid={$tid}&pid={$pid}'>Delete Disease</a>";
            echo "<a class='btn btn-outline-warning btn-small' href='edit.php?tid={$tid}&pid={$pid}'>Edit Disease</a>";
        } 
        if(!isset($_GET['home'])){
          echo ' <a class="btn btn-outline-info btn-small" href="sdis.php?tid='.$tid.'">Back</a>';
        }
     ?>

    </nav>
 
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php
mysqli_close($conn);
?>

  </body>
</html>