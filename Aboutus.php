<?php
include 'connection.php';
$sql="SELECT * from aboutus";
$query=mysqli_query($conn,$sql);
?>
<!doctype html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>About Us</title>
    <style type="text/css">
      #main{
        width: 41px;
        height: 41px;
      }
      nav{
        background-color: indigo;
      }
      a{
         color: white;
     }
     a:hover{
        color: white;

     }
      .headers{
        background-color:purple;
      
        color: white;
        text-align: center;

      }
      .logo{
        width:151px;
    </style>
  <div class="headers">
 
    <a href="main.html"><h2 >Janapada vaidya Nidihi</h2></a>
    
  </div>
     <img src="sdm.png" class="float-right logo">
     <img src="SDMPCA.jpg" class="logo">

  </head>
  <body>
    <div class="container">
      <table class="table">  
    		<?php
          while ($row=mysqli_fetch_assoc($query)) {
            $path=$row['paths'];
            $aid=$row['A_ID'];
            echo "<tr><td><img src='$path' alt='Image not Found' class='img-fluid'></td><tr>";
            echo "<tr><td>{$row['Name']}</td></tr> ";
            echo "<tr><td>{$row['Description']}";
            echo "<a href='del_about.php?aid=$aid' class='btn btn-outline-danger btn-sm float-right'>-</a></td></tr>";
          }
        ?>
 
  	</div>
  </table>
</div>
<nav class="navbar">
  <a href="add_about.php" class="btn btn-outline-warning">Add About Us</a>
  <a href='main.html' class='btn btn-primary'>Home Page</a>
</nav>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>