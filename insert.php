<?php
include 'connection.php';
session_start();


function prints($names,$phones,$adds,$genders,$diss,$ages)
{
            echo "<center>";
        echo "<b>";
        echo "Name of practioner  :{$names}";
        echo '<br>';
        echo "Phone number :{$phones}";
        echo '<br>';
        echo "Gender :{$genders}";
        echo '<br>';
        echo "Age :{$ages}";
        echo '<br>';
        echo "Address :{$adds}";
        echo '<br>';
        echo "District :{$diss}";
        echo '<br>';
        
        echo "</b>";
        echo "</center>";
}


$search="";
if(mysqli_connect_error())
{
die(mysqli_connect_error());
}
else
{
    
        $resp=$_POST['resp'];
        $resp= $resp." ";
        $names=$_POST['name'];
        $name=$resp.$names;
        $gender=$_POST['gender'];
        $age=$_POST['age'];
        
        $add=$_POST['add'];
        $dis=$_POST['dis'];
        $state=$_POST['state'];
        $rel=$_POST['rel'];
        $edu=$_POST['edu'];
        $tutor=$_POST['tutor'];
        $prof=$_POST['prof'];
        $exp=$_POST['exp'];
        
        $inter=$_POST['inter'];
        $doi=$_POST['doi'];
        
        
    
        $sql = "INSERT INTO practioners (Phone_no, Name, Gender, Age, Address, District, State, Education, Profession,Relation, Tutor, Experience, Interviwer, Date_of_Interview ) VALUES ('$phone','$name','$gender','$age','$add','$dis','$state','$edu','$prof','$rel','$tutor','$exp','$inter','$doi')";
        $r1=mysqli_query($conn,$sql);
        
        if(mysqli_error($conn))
        {
            echo "<b><center>There Was an error please try in a while...,<center></b>";
            echo mysqli_error($conn);  
            echo "<a href='insert.html'><<please click here to redirect back</a>";          
        }
        else{
            $sql='SELECT PID from practioners ORDER by PID DESC LIMIT 1';
            $qry=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($qry);

            $_SESSION['name']=$name;
            $_SESSION['pid']=$row['PID'];
            prints($name,$phone,$add,$gender,$dis,$age);
            header("refresh:3;url=disease.php");
        }
        $sql='SELECT PID from practioners ORDER by PID DESC LIMIT 1';
            $qry=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($qry);


        $phone=$_POST['phone'];
        if (isset($_FILES['photo'])) {
       $allowext=array("jpg"=>"image/jpg",
                        "JPG"=>"image/jpg",
                        "PNG"=>"image/png",
                        "png"=>"image/png",
                        "jpeg"=>"image/jpeg",
                        "JPEG"=>"image/jpeg",
                        "gif"=>"image/gif",
                        "GIF"=>"image/gif");
        $fname=$_FILES['photo']['name'];
        $ftype=$_FILES['photo']['type'];
        $fsize=$_FILES['photo']['size'];
        $ext = pathinfo($fname, PATHINFO_EXTENSION);
        $maxsize = 2 * 1024 * 1024; 
        $pid=$row['PID']+1;
        if (!array_key_exists($ext, $allowext))          
            {
                die("Error: Please select a valid file format.");
            }
        if ($fsize > $maxsize)          
            {
                die("Error: File size is larger than the allowed limit.");
            }
        if (in_array($ftype, $allowext))
        {
            move_uploaded_file($_FILES["photo"]["tmp_name"],"prac/".$pid.".".$ext); 
            $path="prac/".$pid.".".$ext;
        }
    }
    else{
        $path="0";
    }
    $ups="UPDATE practioners SET paths=$path WHERE pid=$pid";   
       
}
 




mysqli_close($conn);
?>