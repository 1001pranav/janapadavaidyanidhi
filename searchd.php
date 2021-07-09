<?php
include 'connection.php';
$search=$_POST['search'];
$output="";
 if (isset($_POST['search'])) {
        
        $dname=$_POST['d_name'];
        $sql="SELECT treatment.D_names as named, practioners.Name as pracname, practioners.Phone_no as phnno, practioners.Address as phaddr, practioners.District as dist ,practioners.Zone as zone from practioners ,  treatment where  treatment.D_names='$dname'  and practioners.Phone_no=treatment.Phone_no and treatment.D_names  like '%$dname%' order by dist ";
        $r1=mysqli_query($conn,$sql);


if(mysqli_num_rows($r1) > 0) {
    $output= "<thead class='thead-dark'>
        <tr>
        <th> Disease Name</th>
        <th> Practioner Name </th>
        <th>Phone No</th>
        <th>Address</th>
        <th>District</th>
        <th>Zone</th>
        <th>Report</th>
        </tr>
        </thead>";
  while($row = mysqli_fetch_assoc($r1)) 
  {
    
    $output .="<tr>
    <td>
    <a href='showdis.php?dname={$row['named']}&phn={$row['phnno']}'>{$row['named']} </a>
    </td>
   <td>
   <a href='showprc.php?phn={$row['phnno']}'>{$row['pracname']}</a>
   </td>
    <td>{$row['phnno']}</td>
    <td>{$row['phaddr']}</td>
    <td>{$row['dist']}</td>
    <td>{$row['zone']}</td>
    <td>
    <a href='report.php?dname=$row['named']&phn=$row['phnno']'>Report</a>
    </td></tr>";
  }
}
else{
   $output= "<b>No Disease Record Found....,</b>";
}
}
echo $output;

mysqli_close($conn);
?>