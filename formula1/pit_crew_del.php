<?php 
if(!empty($_GET['MEMBER_ID']))
{
	require_once 'includes/db.php';
	$member_id=$_GET['MEMBER_ID'];
	$query="DELETE FROM PIT_CREW_MEMBER WHERE MEMBER_ID='$member_id'";
	$result=mysqli_query($conn,$query);
	if($result){
		header('location:/formula1/pit_crew.php?msg=del');
	}
}

