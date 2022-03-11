<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $team_id=$_POST['TEAM_ID']; $race_id=$_POST['RACE_ID']; $position=$_POST['POSITION'];
  $query = "UPDATE PARTICIPATES_IN SET POSITION='$position' WHERE TEAM_ID='$team_id' AND RACE_ID='$race_id'";
  $msg="edit";
  $result=mysqli_query($conn,$query);
  if($result){
  	header('location:/formula1/teams_races.php?msg=' . $msg);
  }
}
if(isset($_GET['TEAM_ID']) && $_GET['TEAM_ID']!=NULL && isset($_GET['RACE_ID']) && $_GET['RACE_ID']!=NULL){
  require_once 'includes/db.php';
  $team_id=$_GET['TEAM_ID']; $race_id=$_GET['RACE_ID'];
  $position=$_GET['POSITION'];
} else { $team_id=NULL; $race_id=NULL; $position=NULL;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php'; ?>
<body>
 <?php include 'partial/teams_races_nav.php'; ?>
  <div class="container">
    <div class="formdiv">
    <div class="info"></div>
    <form method="POST" action="teams_races_edit.php">
	<div class="form-group-row">
    		<label for="TEAM_ID" class="col-sm-3 col-form-label">Team ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="TEAM_ID" class="form-control" id="TEAM_ID" value="<?php echo $team_id; ?>" readonly/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="RACE_ID" class="col-sm-3 col-form-label">Race ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="RACE_ID" class="form-control" id="RACE_ID" value="<?php echo $race_id; ?>" readonly/>	
    		</div>
    	</div>
	<div class="form-group-row">
    		<label for="POSITION" class="col-sm-3 col-form-label">Position</label>
    		<div class="col-sm-7">
    		<input type="text" name="POSITION" class="form-control" id="POSITION" value="<?php echo $position; ?>"/>	
    		</div>
    	</div>    	
    	<div class="form-group-row">
    		<div class="col-sm-7">
    		<input type="submit" name="submit" class="btn btn-success" value="Submit" />
    		</div>
    	</div>
    </form>
    </div>
  </div>
</body>
</html>


