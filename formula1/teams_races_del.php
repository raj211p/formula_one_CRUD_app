<?php 
if(!empty($_GET['TEAM_ID']) && !empty($_GET['RACE_ID']))
{
	require_once 'includes/db.php';
	$team_id=$_GET['TEAM_ID']; $race_id=$_GET['RACE_ID'];
	$query="DELETE FROM PARTICIPATES_IN WHERE TEAM_ID='$team_id' AND RACE_ID='$race_id'";
	$result=mysqli_query($conn,$query);
	if($result){
		header('location:/formula1/teams_races.php?msg=del');
	}
}

