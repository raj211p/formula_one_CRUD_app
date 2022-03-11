<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $team_id=$_POST['TEAM_ID']; $race_id=$_POST['RACE_ID']; $position=$_POST['POSITION'];
  $query = "INSERT INTO PARTICIPATES_IN VALUES ('$team_id','$race_id','$position')";
  $msg="add";
  $result=mysqli_query($conn,$query);
  if($result){
  	header('location:/formula1/teams_races.php?msg=' . $msg);
  }
}
if(isset($_GET['TEAM_ID']) && isset($_GET['RACE_ID'])){
  /*Do nothing*/
} else { $team_id=NULL; $race_id=NULL; $position=NULL; 
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php'; ?>
<body>
 <?php include 'partial/nav.php'; ?>
  <div class="container">
    <div class="formdiv">
    <div class="info"></div>
    <form method="POST" action="teams_races_add.php">
    	<div class="form-group-row">
    		<label for="TEAM_ID" class="col-sm-3 col-form-label">Team ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="TEAM_ID" class="form-control" id="TEAM_ID"/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="RACE_ID" class="col-sm-3 col-form-label">Race ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="RACE_ID" class="form-control" id="RACE_ID"/>	
    		</div>
    	</div>
	<div class="form-group-row">
    		<label for="POSITION" class="col-sm-3 col-form-label">Position</label>
    		<div class="col-sm-7">
    		<input type="text" name="POSITION" class="form-control" id="POSITION"/>	
    		</div>
    	</div>
      <br/>
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
