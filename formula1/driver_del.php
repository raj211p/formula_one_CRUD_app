<?php 
if(!empty($_GET['DRIVER_ID']))
{
	require_once 'includes/db.php';
	$driver_id=$_GET['DRIVER_ID'];
	$query="DELETE FROM DRIVER WHERE DRIVER_ID='$driver_id'";
	$result=mysqli_query($conn,$query);
	if($result){
		header('location:/formula1/driver.php?msg=del');
	}
}


