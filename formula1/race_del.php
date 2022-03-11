<?php 
if(!empty($_GET['RACE_ID']))
{
	require_once 'includes/db.php';
	$race_id=$_GET['RACE_ID'];
	$query="DELETE FROM RACE WHERE RACE_ID='$race_id'";
	$result=mysqli_query($conn,$query);
	if($result){
		header('location:/formula1/race.php?msg=del');
	}
}
