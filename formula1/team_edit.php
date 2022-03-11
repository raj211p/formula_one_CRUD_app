<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $team_id=$_POST['TEAM_ID']; $team_name=$_POST['TEAM_NAME'];
  $no_of_drivers=$_POST['NO_OF_DRIVERS']; $no_of_pit_crew=$_POST['NO_OF_PIT_CREW'];
  $no_of_cars=$_POST['NO_OF_CARS']; 
  $query = "UPDATE TEAM SET TEAM_NAME='$team_name' WHERE TEAM_ID='$team_id'";
  $msg="edit";
  $result=mysqli_query($conn,$query);
  if($result){
  	header('location:/formula1/index.php?msg=' . $msg);
  }
}
if(isset($_GET['TEAM_ID']) && $_GET['TEAM_ID']!=NULL){
  require_once 'includes/db.php';
  $team_id=$_GET['TEAM_ID']; $query="SELECT * FROM TEAM WHERE TEAM_ID='$team_id'";
  $res=mysqli_query($conn,$query); 
  $results=mysqli_fetch_row($res);
  $team_name=$results[1];
  $no_of_drivers=$results[2]; $no_of_pit_crew=$results[3];
  $no_of_cars=$results[4];
} else { $team_name=NULL; $no_of_drivers=NULL; $no_of_pit_crew=NULL; $no_of_cars=NULL; 
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
    <form method="POST" action="team_edit.php">
    	<div class="form-group-row">
    		<label for="TEAM_ID" class="col-sm-3 col-form-label">Team ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="TEAM_ID" class="form-control" id="TEAM_ID" value="<?php echo $team_id; ?>" readonly/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="TEAM_NAME" class="col-sm-3 col-form-label">Team Name</label>
    		<div class="col-sm-7">
    		<input type="text" name="TEAM_NAME" class="form-control" id="TEAM_NAME" value="<?php echo $team_name; ?>"/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="NO_OF_DRIVERS" class="col-sm-3 col-form-label">No of drivers</label>
    		<div class="col-sm-7">
    		<input type="text" name="NO_OF_DRIVERS" class="form-control" id="NO_OF_DRIVERS" value="<?php echo $no_of_drivers; ?>" readonly/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="NO_OF_PIT_CREW" class="col-sm-3 col-form-label">No of pit crew</label>
    		<div class="col-sm-7">
    		<input type="text" name="NO_OF_PIT_CREW" class="form-control" id="NO_OF_PIT_CREW" value="<?php echo $no_of_pit_crew; ?>" readonly/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="NO_OF_CARS" class="col-sm-3 col-form-label">No of cars</label>
    		<div class="col-sm-7">
    		<input type="text" name="NO_OF_CARS" class="form-control" id="NO_OF_CARS" value="<?php echo $no_of_cars; ?>" readonly/>	
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