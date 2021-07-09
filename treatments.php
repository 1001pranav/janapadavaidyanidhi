<?php
include 'connection.php';
session_start();
$name=$_SESSION['name'];
$dname=$_SESSION['dname'];
?>
<!doctype html>
<html lang="en">
  <head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
        h2{
            text-decoration:underline;
            text-align:center;
        }
        body{
            background-color: #12d22a85;
            }
        </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>Treatment  </title>
  </head>
  <body>

        <div class="alert alert-success"  role="alert">
  <h2>Enter the treatment</h2>
  <h4>Name of the Practioner :<?php echo $name ?></h4>
  <br/>
 <h4> Disease Name: <?php echo $dname ?></h4>
</div>
    <hr>
    <form method="POST" action="treatment.php">
        <table class="table">
            <tr>
                <th>Disease Name</th>    
            <td>
             <input type="text" name="d_name" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
            </td>    
            </tr>
`           <tr>
            <th>
                
            </th>
            <td>
                
            </td>
            </tr>
            <tr>
                <th>
                    
                </th>
                <td>
                    
                </td>    
            </tr>
            <tr>
                <th>
                    
                </th>
                <td>
                    
                </td>
            </tr>
            <tr>
                <th>
                    
                </th>
                <td>
                    
                 
                </td>
            </tr>
            <tr>
                <th>
                    
                </th>
                <td>
                
                
                </td>
            </tr>
            <tr>
                <th>

                
                </th>
                <td>
                
                </td>
            </tr>
            <tr><th>
                </th>
                <td >
<input type="submit" class="btn btn-success btn-lg"name="">  </td></tr>
</table>
</form>
<nav class="navbar">
<a href="disease.php" class="btn btn-primary  active" role="button" aria-pressed="true">Back</a>
<a href="main.html"  class="btn btn-primary active" role="button" aria-pressed="true">Home</a>
<a href="sdis.php"  class="btn btn-primary  active " role="button" aria-pressed="true">Search Disease</a>
</nav>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>