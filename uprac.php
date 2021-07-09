<?php
include "connection.php";
if(isset($_POST['pid']))
{   $pid=$_POST['pid'];
    $phone=$_POST['phone'];
    $name=$_POST['name'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $add=$_POST['add'];
    $dis=$_POST['dis'];
    $state=$_POST['state'];
    $edu=$_POST['edu'];
    $rel=$_POST['rel'];
    $tutor=$_POST['tutor'];
    $exp=$_POST['exp'];
    $prof=$_POST['prof'];
    $doi=$_POST['doi'];
    $intr=$_POST['intr'];
    
    $sql="UPDATE practioners SET Phone_no='$phone',Name='$name',Gender='$gender',Age='$age',Gender='$gender',Address='$add',District='$dis',State='$state',Education='$edu',Relation='$rel',Tutor='$tutor',Profession='$prof',Date_of_Interview='$doi',Interviwer='$intr' where PID='$pid'";
    $qur=mysqli_query($conn,$sql)or die(mysqli_error($conn));
    if(!mysqli_error($conn)){
        echo "<center><b>Update Success</b></center>";
        header("refresh:1;url=showp.php?phn=$phone");
    }
    else
    {
        echo "<b><center>There was a mistake please try again</center</b>";
        
    }
}
?>