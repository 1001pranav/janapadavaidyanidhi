<?php
include 'connection.php';
$search=$_POST['search'];
        $data="";
    	if(!empty($search))
    	{ 
        $sql = "SELECT * FROM practioners WHERE Name LIKE '%$search%' or Phone_no LIKE '%$search%'";
        $r1=mysqli_query($conn,$sql);
      
        if(mysqli_error($conn))
        {
            $data.= mysqli_error($conn);
        }
        else
        {
         $row=mysqli_num_rows($r1);
        
    if($row!=0)
        {
        	
        while($query=mysqli_fetch_array($r1))
        {   $pid=$query['PID'];
            $nam=$query['Name'];
            $data.="<a id='send' href='session.php?pid=$pid&name=$nam'>{$query['Name']}</a><br/>";
            
        }
        }
    }
echo "<div id='research'>{$data}</div>";
}
?>