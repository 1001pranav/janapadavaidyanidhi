
<?php
include 'connection.php';
$num=0;
if(isset($_GET['pid'])){
$pid=$_GET['pid'];
session_start();
$sqlp="SELECT * from  practioners where PID ='$pid' ";
$pr=mysqli_query($conn,$sqlp)or die(mysqli_error($conn));
$disp = mysqli_fetch_assoc($pr);
$num=mysqli_num_rows($pr);
}

?>
<!doctype html>
<html lang="en">
  <head>
    <style>
.container{
      background-image: url('SDMPCA1.png');
     
      background-size: 100%;    }
    b{ 
        text-align:center; 
    }
    strong{
      border:solid;
      font-size: 25px;
    }
   #main{
    width:15%;
    height: 20%;
   }
  img:hover{
    
    height: 100%;
  }
  
   #small{
    width:40%;
   }
    #fnt{
      font-size: 21px
    }
   
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
   
    <title>Show Practioner</title>
  </head>
  <body>
    <div id='img'>
      
    </div>
    <div class="container">
    <table id='hide' class="table table-bordered">
   
<?php
  if(!empty($pid) and isset($_GET['pid']))
    {
      $dis='None';
      $num=mysqli_num_rows($pr);

      if($num>0)
      {   
        
        $phone=$disp['Phone_no'];
        $path=$disp['paths'];
        $pquery="SELECT TID,D_name,Medicaments,Observation from disease where PID='$pid'";
        $plants=mysqli_query($conn,$pquery)or die(mysqli_error($conn));
        $treat="SELECT D_names from treatment where PID='$pid'";
        $texc=mysqli_query($conn,$treat);
        
        echo "<th colspan=2 id='fnt'><center>Practioner Infomation</center></th>";
        
        echo "<tr><th>Name </th><td><img src='{$path}'  id='main'alt='Image not Found'></img><br>".$disp['Name']."</td></tr>";
        echo "<tr><th>Age </th><td>".$disp['Age']."</td></tr>";
        echo "<tr><th>Gender </th><td>".$disp['Gender']."</td></tr>";
        echo "<tr><th>Address </th><td>".$disp['Address']."</td></tr>";
        echo "<tr><th>Phone Number </th><td>".$phone."</td></tr>";
        echo "<tr><th>District </th><td>".$disp['District']."</td></tr>";

        echo "<tr><th>State</th><td>".$disp['State']."</td></tr>";  
        echo "<tr><th>Profession </th><td>".$disp['Profession']."</td></tr>";
        echo "<tr><th>Relation, Tutor</th><td>{$disp['Relation']} ".$disp['Tutor']."</td></tr>";
        echo "<tr><th>Education</th><td>".$disp['Education']."</td></tr>";
        echo "<tr><th>Experience </th><td> ".$disp['Experience']."</td></tr>";
        echo "<tr><th>Diseases Mentioned</th><td>";
        while ($trt=mysqli_fetch_assoc($texc)) 
        {
          echo $trt['D_names'],"<br />";
        }
        echo "</td></tr>";
        echo "<tr><th>Interviwer </th><td>".$disp['Interviwer']."</td></tr>";
        echo " <tr><th>Date of Interview</th><td>".$disp['Date_of_Interview']."</td></tr>";
        echo "</table>";
      
        while($pdt=mysqli_fetch_assoc($plants))
        {   $tid=$pdt['TID'];
          $dname=$pdt['D_name'];
          if($dis!=$tid){
            $dis=$tid;
            $tquery="SELECT * FROM treatment WHERE PID='$pid' AND TID='$tid'";

            $dquer="SELECT COUNT(disease.D_name) as nums ,COUNT(treatment.D_names)  as tnums from disease,treatment where disease.TID='$tid'and treatment.TID='$tid' and treatment.PID='$pid' and disease.PID='$pid' ";
            $cnt=mysqli_query($conn,$dquer)or die(mysqli_error($conn));

            $ct=mysqli_fetch_assoc($cnt);
            $treat=mysqli_query($conn,$tquery)or die(mysqli_error($conn));
            
         
            echo "<table class='table table-bordered'>";
            echo "<th colspan=2 id='fnt'><center>Infomation about Plant for {$dname}</center></th>";
            echo "<tr><th>Disease Name</th><td>{$dname}</td></tr>";
            echo "<tr><th>Symptoms/ Observation</th><td>{$pdt['Observation']}</td></tr>";
            echo "<tr><th>Medicaments</th><td>{$pdt['Medicaments']}</td></tr>";
            echo "</table>";
            $psql="SELECT Plant_name,Vernacular_name,Scientific_name,Family_description,Parts,Quantitiy,Form,Duration,paths from disease where PID='$pid' and TID='$tid'";
            $plnt=mysqli_query($conn,$psql) or die(mysqli_error($conn));
            echo "<table class='table table-bordered'>";
            echo '<tr><th>Plant Image</th><th> Plant Name</th><th>Vernacular Name</th><th>Scientific Name</th><th>Family Description</th><th>part Used</th><th>Quantity</th><th>Form</th><th>Duration</th></tr>';
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
              $_SESSION['dis']=$dname;              echo "<table class='table table-bordered'>";
              echo "<th colspan=2 id='fnt'><center>Treatment for {$dname}</center></th>";
              echo  "<tr><th>Disease Name</th><td>{$arr['D_names']}</td></tr>";
              echo  "<tr><th>Method of Preparation</th><td>{$arr['Preperations']}</td></tr>";
              echo  "<tr><th>Method Of Administration</th><td>{$arr['Method_of_Admin']}</td></tr>";
              echo  "<tr><th>Indications</th><td>{$arr['Indications']}</td></tr>";
              echo  "<tr><th>Contra Indications</th><td>{$arr['contra_indications']}</td></tr>";
              echo  "<tr><th> Severity</th><td>{$arr['Severity']}</td></tr>";
              echo  "<tr><th> Comments</th><td>{$arr['comments']}</td></tr>";
              echo "</table>";
              $tid=$arr['TID'];
              $sql="SELECT tid from paths where TID='$tid'";
              $tidq=mysqli_query($conn,$tquery); 
             if(mysqli_num_rows($tidq)>0){
                echo "<a href='showpics.php?tid=$tid'>Show other pics</a>";     
            } 
            if($ct['nums']==0)
            {
              echo "<b>No Treatment has been Mentioned for  {$dname}</b> <br/>";
            }
          }
          }
        if(mysqli_num_rows($plants)==0)
        {
          echo "<center><b>plants data not found</b></center>";
          $tquery="SELECT * FROM treatment WHERE PID='$pid'";
          $tdat=mysqli_query($conn,$tquery);
          while ($arr=mysqli_fetch_assoc($tdat)) {

              echo "<table class='table table-bordered'>";
              echo "<th colspan=2 id='fnt'><center>Treatment for {$arr['D_names']}</center></th>";
              echo  "<tr><th>Disease Name</th><td>{$arr['D_names']}</td></tr>";
              echo  "<tr><th>Method of Preperations</th><td>{$arr['Preperations']}</td></tr>";
              echo  "<tr><th>Method Of Administration</th><td>{$arr['Method_of_Admin']}</td></tr>";
              echo  "<tr><th>Indications</th><td>{$arr['Indications']}</td></tr>";
              echo  "<tr><th>Contra Indications</th><td>{$arr['contra_indications']}</td></tr>";
              echo  "<tr><th> Severity</th><td>{$arr['Severity']}</td></tr>";
              echo  "<tr><th> Comments</th><td>{$arr['comments']}</td></tr>";
              echo "</table>";    

              }  

          }
        }

      }
      else
      {
        echo"<b><center>NO Record Found</center></b>";
      }
    }
  else
    {echo "<b>URL Error Please go back and check again</b>";}
?>

</table>
</div>

   <nav class="navbar">
    <a class="btn btn-info btn-small" href="main.html">Back</a>
   <?php 

   if(!empty($pid) and $num>0)
   {
           echo "<a class='btn btn-warning btn-small' href='editp.php?pid={$pid}'>Edit Practioner</a>";
       echo "<a class='btn btn-warning btn-small' href='edit.php?pid={$pid}'>Edit Plant</a>";
     
   echo "<a class='btn btn-danger btn-small' href='delprac.php?pid={$pid}'>Delete Practioner</a>";   }
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
