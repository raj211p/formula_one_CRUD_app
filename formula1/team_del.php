<?php 
if(!empty($_GET['TEAM_ID']))
{
	require_once 'includes/db.php';
	$team_id=$_GET['TEAM_ID'];
	$query="DELETE FROM TEAM WHERE TEAM_ID='$team_id'";
	$result=mysqli_query($conn,$query);
	if($result){
		header('location:/formula1/index.php?msg=del');
	}
}