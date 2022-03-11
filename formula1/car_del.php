<?php 
if(!empty($_GET['CAR_ID']))
{
	require_once 'includes/db.php';
	$car_id=$_GET['CAR_ID'];
	$query="DELETE FROM CAR WHERE CAR_ID='$car_id'";
	$result=mysqli_query($conn,$query);
	if($result){
		header('location:/formula1/car.php?msg=del');
	}
}

