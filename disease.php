<?php
include 'connection.php';
session_start();
?>
<!DOCTYPE html>
<html>
<head>


  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <title>Insert Plant and Disease Data</title>
  <style>
    hr{
      border:2px solid;
    }
    #add_but{
      display:none;
    }
    h1,strong{
      color: white;
    }
    body{
      background-image: linear-gradient(deepskyblue,lightblue,powderblue,aliceblue,honeydew,mistyrose,midnightblue);
    }

  </style>
<script>
function addb(x){
    if (x==0)
    {
        document.getElementById('add_but').style.display='none';
    }
    else
    {
        document.getElementById('add_but').style.display='block';
    }
    
}

</script>
</head>
<body>
<center>
  <h1> Insert Plant name and name of the disease</h1>
  </center>
   <?php
    if(isset($_SESSION['name'])){
  echo "<strong>Name Of the Practioner:",$_SESSION['name'],"</strong>";
}
    else{
        echo"<strong> Name of the practioner not set</strong><br/>";
        echo "<a class='btn btn-warning ' href='/insert.html'>back</a>";
        
    }
    ?>

  <hr>

<form method="POST" action="inputd.php" enctype="multipart/form-data">
  <div class="container shadow-lg">
    <table class="table ">
      <div class="form-group mb-3">
        <tr>
          <th>
            Disease Name
          </th>
          <td >
            <input type="text" class="form-control" name="dname" id='dname'>
          </td>
        </tr>
        <tr>
          <th>
            Symptoms/Observation 
          </th>
          <td >
            <input type="text" class="form-control" name="obs" id='obs'>
          </td>
        </tr>
      </div>
    </table>
    <table class="table ">
      <div class="table-responsive" >
        <div class="input-group mb-3">
          <tr>
            <th>
              Medicaments
            </th>
            <td >
              <input type="radio" id="medic" name="medic" onclick="addb(0)" checked  value="Simple">
              <label for="Simple">Simple</label>
              <input type="radio" id="medic" name="medic" onclick="addb(1)" value="compound">
              <label for="compound">Compound</label>    
            </td>
          </tr>
        </div>
      </div>
    </table>
  </div>
  <table class="table  shadow-lg" id="crud_table">
    <div class="table-responsive form-group" >
      <tr>
        <th>
          Plant Name
        </th>
        <th>
          Vernacular Name
        </th>
        <th>
          Scientific Name
        </th>
        <th>
          Family Description
        </th>
        <th>
          Part Used
        </th>
        <th>
          Quantity
        </th>
        <th>
          Form
        </th>
        <th>
          Duration
        </th>
        <th> 
          image
        </th>
      <tr>
        <td name="p_name">
          <input type='text' class="form-control"  name='p_name[]'>
        </td>
        <td name="v_name">
          <input type='text' class="form-control" name='v_name[]'>
        </td>
        <td name="s_name">
          <input type='text' class="form-control" name='s_name[]'>
        </td>
        <td name="f_desc">
          <input type='text' class="form-control" name='f_desc[]'>
        </td>
        <td name="part">
          <input type='text' class="form-control" name='part[]'>
        </td>
        <td name="quant">
          <input type='text' class="form-control" size="2" name='quant[]'>
        </td>
        <td name="form">
          <input type='text' class="form-control" size=4 name='form[]'>
        </td>
        <td name="dur">
          <input type='text' class="form-control"size=4 name='dur[]'>
        </td>
        <td> 
          <input type="file" class="form-control" name="image[]" value="" /> 
        </td>
        <td>
        </td>
      </tr>
      <tr></tr>
    </div>
  </table>
  <div align="right" id="add_but">
  <button type='button' name='add' id='add' class='btn btn-success btn-xs'>+</button>
  </div> 
  <div class="container shadow-lg">
    <table class="table form-group">
      <div class="table-responsive" >
        <tr>
          <th>
            Method Of Preparation
          </th>
          <td>
            <textarea class="form-control" name="proc"  rows="5"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            Method of Administration
          </th>
          <td>
            <textarea class="form-control" name="moa"  rows="3"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            Indications
          </th>
          <td>
            <textarea class="form-control" name="indi" rows="3"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            Contra Indications
          </th>
          <td>
             <textarea class="form-control" name="contra"  rows="3"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            Severity Of Disease
          </th>
          <td>
            <textarea class="form-control" name="sev"  rows="3"></textarea>
          </td>
        </tr>
        <tr>
          <th>
            Comments/ Other Infomation
          </th>
          <td>
            <textarea class="form-control" name="oi"  rows="5"></textarea>
          </td>
        </tr>
      </div>
    </table>
  </div> 
  <div class="container shadow-lg" >
    <h6>Note:Size Must be less than 20Mb</h6>
    <label>Uploading?...<label>Yes<input type="radio" name="upload" value="yes"></label><label>No<input type="radio" name="upload" value="no" checked=""></label></label>
    <table class="table table-bordered form-group"id="atable">
      <tr>
        <th>
          Name
        </th>
        <td>
          <input type='text' class='form-control'name='fname[]' value=''>
        </td>
        <th>
          Description
        </th>
        <td>
          <textarea class="form-control" name="desp[]"></textarea>
        </td>
        <th>
          Type
        </th>
        <td>
          <select name='ftype[]' class='form-control'>
            <option selected=''>Images</option>
            <option >Videos</option>
          </select>
        </td>
          <th>
            File
          </th>
          <td>
           <input type='file' name='photo[]' value=''>
          </td>
          
      </tr>
 </table>
    <button class="btn btn-success" id='left' type="button">+</button>
  </div>
<nav class="navbar">
   <a href="main.html"  class="btn btn-outline-primary " role="button" aria-pressed="true">Home</a>
   <button type="submit" name="save" id="save" class="btn btn-info">Save</button>
   <a href="sdis.php"  class="btn btn-outline-success" role="button" aria-pressed="true">Search Disease</a>
 </nav>
</form>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>
<script>

$(document).ready(function(){
 var count = 1;

 $('#add').click(function(){
  count = count + 1;
  var html_code = "<tr id='row"+count+"'>";

  html_code += "<td  name='p_name'><input type='text' class='form-control' name='p_name[]'></td>";
  
  html_code += "<td  name='v_name'><input type='text' class='form-control'  name='v_name[]'></td>";
  html_code += "<td  name='s_name'><input type='text' class='form-control'  name='s_name[]'></td>";
  html_code += "<td  name='f_desc'><input type='text' class='form-control'  name='f_desc[]'></td>";
  html_code += "<td  name='part'><input type='text' class='form-control'  name='part[]'></td>";
  html_code += "<td  name='quant'><input type='text' class='form-control'  size='2' name='quant[]'></td>";
  html_code += "<td   name='form'><input type='text' class='form-control' size='4'  name='form[]'></td>";
  html_code += "<td   name='dur'><input type='text' class='form-control'  size='4' name='dur[]'></td>";
  html_code += "   <td> <input type='file' class='form-control' name='image[]'></td>";
  html_code += "<td><button type='button' name='remove' data-row='row"+count+"' class='btn btn-danger btn-xs remove'>-</button></td>";   
  html_code += "</tr>";  
  html_code +="<tr class='app'></tr>"
   $('#crud_table').append(html_code);
 });

  $(document).on('click', '.remove', function(){
  var delete_row = $(this).data("row");
  $('#' + delete_row).remove();
 });
  var counts=1;
 
  $('#left').on('click',function(){
    counts+=1;
    var code='<tr class="row'+counts+'">'
    code+="<th>Name</th><td><input type='text' class='form-control' name='fname[]' value=''></td>";
    code +="<th>Description</th><td><textarea class='form-control' name='disp[]'></textarea></td>";
    code +="<th>Type</th><td><select name='ftype[]' class='form-control'><option selected=''>Images</option><option>Videos</option></select></td>";
    code+="<th>File</th><td><input type='file' name='photo[]' value=''></td></tr>";
    $('#atable').append(code);
  });
 
});
 </script>