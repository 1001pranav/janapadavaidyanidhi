<?php
include 'connection.php';
if(isset($_POST['type'])){
	$value=$_POST['value'];
	$type=$_POST['type'];
	$data="";
	if(strlen($value)>2){
	$data=" <ul >";
	$repete="";
	if($type=='district'){

		$sql="SELECT State, District from practioners where District LIKE '%$value%' group by District";
		$query=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	while ($row=mysqli_fetch_assoc($query)) {
		if($repete!=$row['District'])
		{$dis=$row['District'];
		 $dis .=" ";
		 $dis .=$row['State'];
			$data .="<li class='list-unstyled'><button type='button'  value='{$dis}'onclick='setds(this)' class='btn btn-outline-success btn-sm'>{$row['District']} {$row['State']}</button></li>";
			$repete=$row['District'];
		}
		$data .="</ul>";
		
	}

	}
	elseif($type=='prof')
	{
		$sql="SELECT Profession from practioners where Profession LIKE '%$value%' group by Profession";
		$query=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	while ($row=mysqli_fetch_assoc($query)) {
		if($repete!=$row['Profession'])
		{ $pro=$row['Profession'];
			$data .="<li class='list-unstyled'><button type='button'  value='{$pro}'onclick='setpr(this)' class='btn btn-outline-success btn-sm'>{$row['Profession']} </button></li>";
			$repete=$row['Profession'];
		}
		$data .="</ul>";
		
	}
	}
	elseif($type=='int')
	{
		$sql="SELECT Interviwer from practioners where Interviwer LIKE '%$value%' group by Interviwer";
		$query=mysqli_query($conn,$sql)or die(mysqli_error($conn));
	while ($row=mysqli_fetch_assoc($query)) {
		if($repete!=$row['Interviwer'])
		{ $int=$row['Interviwer'];
			$data .="<li class='list-unstyled'><button type='button' value='{$int}' onclick='seti(this)' class='btn btn-outline-success btn-sm'>{$row['Interviwer']}</button></li>";
			$repete=$row['Interviwer'];
		}
		$data .="</ul>";
		
	}
	}

	if(strlen($value)>8){
	if ($type=="phone") {
		$sql ="SELECT Phone_no from practioners where Phone_no LIKE '%$value%'";
		$query=mysqli_query($conn,$sql)or die(mysqli_error($conn));
		if(mysqli_num_rows($query)!=0){
			$data ="true";
		}
		else{
			$data ="false";
		}
	}
	
}
	echo $data;
	
}

}
mysqli_close($conn);
?>