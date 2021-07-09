<?php
include 'connection.php';
$data="";

if(isset($_POST['phn'])){

    $phn=$_POST['phn'];
if($phn!=''){
    $sqlp="SELECT * from  practioners where Phone_no LIKE '%$phn%' or Name LIKE'%$phn%' ";
$pr=mysqli_query($conn,$sqlp)or die(mysqli_error($conn));
while ( $disp = mysqli_fetch_assoc($pr)) {
	$pid=$disp['PID'];
	$data .="<a class='link' href='showp.php?pid={$pid}'>{$disp['Name']}</a><br>";
}
echo"<div class='shadow'>{$data}</div>";
}
}
else{
echo "<center><b>Phone Number OR Name Field is Empty</center></b>";

}
?>