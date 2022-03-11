<?php 
if(!empty($_GET['CAR_ID']) && !empty($_GET['MEMBER_ID']))
{
	require_once 'includes/db.php';
	$car_id=$_GET['CAR_ID']; $member_id=$_GET['MEMBER_ID'];
	$query="DELETE FROM PIT_CREW_CARS_WORKED_ON WHERE CAR_ID='$car_id' AND MEMBER_ID='$member_id'";
	$result=mysqli_query($conn,$query);
	if($result){
		header('location:/formula1/cars_pit_crew.php?msg=del');
	}
}
