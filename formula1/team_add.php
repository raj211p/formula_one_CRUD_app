<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $team_id=$_POST['TEAM_ID']; $team_name=$_POST['TEAM_NAME'];
  $no_of_drivers=$_POST['NO_OF_DRIVERS']; $no_of_pit_crew=$_POST['NO_OF_PIT_CREW'];
  $no_of_cars=$_POST['NO_OF_CARS']; 
  $query = "INSERT INTO TEAM VALUES ('$team_id','$team_name','$no_of_drivers','$no_of_pit_crew','$no_of_cars')";
  $msg="add";
  $result=mysqli_query($conn,$query);
  if($result){
  	header('location:/formula1/index.php?msg=' . $msg);
  }
}
if(isset($_GET['TEAM_ID'])){
  /*Do nothing*/
} else { $no_of_drivers=NULL; $no_of_pit_crew=NULL; $no_of_cars=NULL; 
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
    <form method="POST" action="team_add.php">
    	<div class="form-group-row">
    		<label for="TEAM_ID" class="col-sm-3 col-form-label">Team ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="TEAM_ID" class="form-control" id="TEAM_ID"/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="TEAM_NAME" class="col-sm-3 col-form-label">Team name</label>
    		<div class="col-sm-7">
    		<input type="text" name="TEAM_NAME" class="form-control" id="TEAM_NAME"/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="NO_OF_DRIVERS" class="col-sm-3 col-form-label">No of drivers</label>
    		<div class="col-sm-7">
    		<input type="text" name="NO_OF_DRIVERS" class="form-control" id="NO_OF_DRIVERS" value="0"/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="NO_OF_PIT_CREW" class="col-sm-3 col-form-label">No of pit crew</label>
    		<div class="col-sm-7">
    		<input type="text" name="NO_OF_PIT_CREW" class="form-control" id="NO_OF_PIT_CREW" value="0"/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="NO_OF_CARS" class="col-sm-3 col-form-label">No of cars</label>
    		<div class="col-sm-7">
    		<input type="text" name="NO_OF_CARS" class="form-control" id="NO_OF_CARS" value="0"/>	
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