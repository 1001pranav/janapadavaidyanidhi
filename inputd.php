<?php
include 'connection.php';
session_start();
$pid=$_SESSION['pid'];
$counts=0;
$p_name=$_POST["p_name"];
$obs=$_POST['obs'];
$v_name=$_POST["v_name"];
$s_name=$_POST['s_name'];
$f_desc=$_POST['f_desc'];
$dname=$_POST['dname'];
$medic=$_POST['medic'];
$part=$_POST['part'];
$quant=$_POST['quant'];
$form=$_POST['form'];
$dur=$_POST["dur"];
$sql='';


$proc=$_POST['proc'];
$moa=$_POST['moa'];
$indi=$_POST['indi'];
$contra=$_POST['contra'];
$sev=$_POST['sev'];
$oi=$_POST['oi'];
$sql = "INSERT INTO treatment (PID, D_names, Preperations, Method_of_Admin, Indications, contra_indications, Severity, comments) VALUES ('$pid', '$dname','$proc', '$moa','$indi','$contra','$sev','$oi')";
$r1=mysqli_query($conn,$sql)or die(mysqli_error($conn)) ;
$sqlt="SELECT TID from treatment order by TID DESC limit 1";
$query=mysqli_query($conn,$sqlt) or die(mysqli_error($conn));
$row=mysqli_fetch_assoc($query);
$cnt=$row['TID'];
for ($counts=0; $counts <count($p_name) ; $counts++)
	{   
		$pname=$p_name[$counts];
        $vname=$v_name[$counts];
		$sname=$s_name[$counts];
		$fdesc=$f_desc[$counts];
        $parts=$part[$counts];
        $qnty=$quant[$counts];
        $forms=$form[$counts];
        $dura=$dur[$counts];
        $path='0';
        $name=$pid.'_'.$counts;
        if (isset($_FILES['image'])) {
                
            $fname=$_FILES['image']['name'][$counts];
            $ftype=$_FILES['image']['type'][$counts];
        	$ext = pathinfo($fname, PATHINFO_EXTENSION); 
	        move_uploaded_file($_FILES["image"]["tmp_name"][$counts],"plant/".$name.".".$ext); 
	        $path="plant/".$name.".".$ext;
	        
        }
    $sql ="INSERT INTO disease (PID,TID, D_name, Observation, Plant_name, Vernacular_name,Scientific_name, Family_description,Parts, Quantitiy, Form,  Duration, Medicaments, paths) VALUES ('$pid','$cnt','$dname','$obs','$pname','$vname','$sname','$fdesc','$parts','$qnty','$forms','$dura','$medic','$path')";
 	$r1=mysqli_query($conn,$sql)or die(mysqli_error($conn)) ;

}
if($_POST['upload']=='yes')
{
    $name=$_POST['fname'];
    $type=$_POST['ftype'];
    for($count=0;$count<count($name);$count++){
        $fname=$_FILES['photo']['name'][$count];
        $ftype=$_FILES['photo']['type'][$count];
        $fsize=$_FILES['photo']['size'][$count];
        $temp=$_FILES["photo"]["tmp_name"][$count];
        $ext = pathinfo($fname, PATHINFO_EXTENSION);
        $maxsize = 20 * 1024 * 1024  ;
        if ($fsize > $maxsize)          
        {
            die("Error: File size is larger than the allowed limit.");
        }else{ 
            $file_name=$name[$count].'_'.$pid.'_'.$count;
            move_uploaded_file($temp,"other_files/".$file_name.".".$ext); 
            $path="other_files/".$file_name.".".$ext;
        }
        $fnm=$name[$count];
        $fty=$type[$count];
        $query="INSERT INTO paths (TID, Name, Type, paths) VAlUES ('$cnt', '$fnm', '$fty', '$path')";
        $sql=mysqli_query($conn,$query) or die(mysqli_error($conn));
    }
}
if(!mysqli_error($conn)){
    echo "<script>";
    echo "alert('Data inserted successfully')";
    echo "</script>";
    header("refresh:1;url=disease.php");
}


?>