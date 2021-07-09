<?php
include 'connection.php';
$null=0;
if(isset($_GET['pid']))
{
$pid=$_GET['pid'];
$sql="SELECT * FROM practioners WHERE PID='$pid'";
$result=mysqli_query($conn,$sql)or die(mysqli_error($conn));
$fetch=mysqli_fetch_assoc($result);
    $null=1;
  
}
?>

<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link rel="stylesheet" href="css/insert.css" type="text/css" >
      <style type="text/css">
        h3{
          color: black;
        }
      </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title> Edit Practioner Data</title>
  </head>
  <body>


   <h3>Practioner Data</h3>
   	<?php
    
       if($null)
       {
   	$name=$fetch['Name'];
   	$phone=$fetch['Phone_no'];
   	$gender=$fetch['Gender'];
   	$age=$fetch['Age'];
   	$add=$fetch['Address'];
   	$dis=$fetch['District'];
   	$state=$fetch['State'];
   	$edu=$fetch['Education'];
   	$rel=$fetch['Relation'];
   	$tutor=$fetch['Tutor'];
   	$exp=$fetch['Experience'];
   	$prof=$fetch['Profession'];
   	$doi=$fetch['Date_of_Interview'];
    $intr=$fetch['Interviwer'];
    $paths=$fetch['paths'];

       }
       else
       {
           echo "<center><b>Error in fetching data or Url is incorrect</b></center>";
$name="";
    $phone='';
	$gender="";
   	$age="";
   	$add="";
   	$dis="";
   	$state="";
   	$edu="";
   	$rel="";
   	$tutor="";
   	$exp="";
   	$prof="";
   	$doi="";
           $phn="";
           $intr="";
           $paths='';
       }
       ?>
       <form method="POST" action="uprac.php">
        <input type='hidden'  name='pid' class='none' value='<?php echo $pid; ?>' > 
      <div class="container">    
        <div class="form-group row">
         
         <div class="col col-md-4 col-sm-4 offset-md-3">
            <label>Name :<input type='text' name='name' class="form-control" value='<?php echo $name; ?>'></label>
          </div>
        </div>
        <div class='form-group row'> 
          <div class="col col-md-3 col-sm-4">
            <label>Phone Number :<input type='tel'  class="form-control" name='phone'   value='<?php echo $phone; ?>'></label>
          </div>
          <div class="col col-md-3 col-sm-4">
            <label>Gender :<input type='text' class="form-control"  name='gender'  value='<?php echo $gender; ?>'></label>
          </div>
          <div class="col col-md-6 col-sm-4">
            <label>Age :<input type='Number' class="form-control"  name='age'  value='<?php echo $age; ?>'></label>
          </div>
        </div>
        <div class='row form-group'>
          <div class="col col-md-3 col-sm-4">   
            <label>Address :<input type='text'  class="form-control" class="height"  id="width" name='add'value='<?php echo $add; ?>'></label>
          </div>
         <div class="col col-md-3 col-sm-4">
            <label>District :<input type='text' class="form-control"  name='dis' value='<?php echo $dis; ?>'></label>
          </div>
          <div class="col col-md-3 col-sm-4">
            <label>State :<input type='text' class="form-control"  name='state' value='<?php echo $state; ?>'></label>
          </div>
        </div>
        <div class='row form-group'>
          <div class="col col-md-3 col-sm-4">
            <label>Education :<input type='text' class="form-control"  name='edu'value='<?php echo $edu; ?>'></label>
          </div>
          <div class="col col-md-3 col-sm-4">
            <label>Profession:<input type='text' class="form-control" name='prof'value='<?php echo $prof; ?>'></label>
          </div>
          <div class="col col-md-3 col-sm-4">
          <label>Experience :<input type='text' class="form-control"   name='exp'value='<?php echo $exp; ?>'></label>
          </div>
        </div>
      <div class="row form-group">
        <div class="col col-md-6 col-sm-4">
          <label>Relation :<input type='text'   class="form-control" name='rel'value='<?php echo $rel; ?>'></label>
        </div>
        <div class="col col-md-6 col-sm-4">
          <label>Tutor :<input type='text' class="form-control"   name='tutor'value='<?php echo $tutor; ?>'></label>
        </div>
      </div>
      <div class="row form-group">
        <div class="col col-md-6 col-sm-4">
          <label>Date of Interview:<input type='text' class="form-control"   name='doi'value='<?php echo $doi; ?>'></label>
        </div>
        <div class="col col-md-6 col-sm-4">
           <label>Interviewer:<input type="text" class="form-control"   name="intr" value="<?php echo $intr; ?>" /></label>
        </div>
      </div>

      <div class="row ">
        <div class="col col-md-6 col-sm-4 offset-md-3">
          <input type="submit" class="btn btn-success" value="Update">
          <a href="delprac.php?pid=<?echo $pid?>" class='btn btn-outline-danger'>Delete Practioner</a>
          <a href="main.html" class='btn btn-outline-info'>Home</a>
        </div>
      </div>
    </div>
   </form>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?php
    mysqli_close($conn);
    ?>
  </body>
</html>