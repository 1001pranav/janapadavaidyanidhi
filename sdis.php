<?php
include 'connection.php';
?>
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<style>

#width{
  font-size: 20px;
  border-radius: 5px;
}
#hight{
  height: 10%;
  width: 15%;
  border-color: honeydew;
}
  h1{
      text-decoration:Underline;
    text-align: center;
  }
  .shadow{
    width:15%;
    font-size: 20px;
    text-align: center;
    font-weight: bold;
    margin-left: 12px;
  }
</style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Search Disease</title>
  </head>
  <body>
    <h1>Search disease</h1>
    <hr>
    <form method="get" class="form-inline"action="sdis.php">
  
  
   <div class="form-group mx-sm-3 mb-2">
    <label for="search" class="sr-only">Disease Name</label>
    <input type="text" class="form-control" name="d_name" id="search" placeholder="search" autocomplete="off">
  </div>
  <input type="submit" name="click" class="btn btn-primary mb-2">
</form>
<div id="result">
  
</div>
<div id="src" class="jumbotron">
  <table class="table table-bordered">
    
<?php
 if (isset($_GET['tid'])) {
        
        $tid=$_GET['tid'];
        $sql="SELECT treatment.TID as tid,treatment.D_names as named, practioners.Name as pracname,practioners.PID as pid ,practioners.Phone_no as phnno, practioners.Address as phaddr, practioners.District as dist  from practioners ,  treatment where   treatment.TID  = '$tid' and treatment.PID=practioners.PID  ";
        $r1=mysqli_query($conn,$sql)or die(mysqli_error($conn));


if(mysqli_num_rows($r1) > 0) {
    echo '<div class="table-responsive">';
    echo "<thead class='thead-dark'>";
    echo "<tr><th> Disease Name</th><th> Practioner Name </th><th class='d-none d-sm-table-cell'>Phone No</th><th class='d-none d-sm-table-cell'>Address</th><th class='d-none d-sm-table-cell'>District</th><th>Report</th></tr>";
    echo "</thead>";
  while($row = mysqli_fetch_assoc($r1)) 
  {
    
    echo "<tr><td><a href='showdis.php?tid={$row['tid']}&pid={$row['pid']}'>{$row['named']} </a></td>";
    echo "<td><a href='showprc.php?pid={$row['pid']}'>{$row['pracname']}</a></td>";
    echo "<td class='d-none d-sm-table-cell'>{$row['phnno']}</td>";
    echo "<td  class='d-none d-sm-table-cell'>{$row['phaddr']}</td>";
    echo "<td  class='d-none d-sm-table-cell'>{$row['dist']}</td>";
    echo "<td><a href='report.php?tid={$row['tid']}&pid={$row['pid']}'>Report</a></td></tr>";
  }
  echo "</div>";
}
else{
    echo "<b>No Treatment for Disease found....</b>";
}
}
  ?>

  </table>
  <a href="main.html" class="btn btn-primary btn-sm">Return home</a>
  <a href="insert.html" class="btn btn-success float-right btn-sm">Insert Disease</a>

</div>
 
   <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#search').on('keyup',function(){
      $('#result').empty();
      $.ajax({
      url:"disearch.php",
      method:"POST",
      data:{dis:$('#search').val()},
      success:function(data){
        $('#result').append(data);
      }
      })
    });

  })
</script>
<?php
mysqli_close($conn);
?>
  </body>
</html>