<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $driver_id=$_POST['DRIVER_ID']; $dob=$_POST['DOB']; 
  $dob=date("Y-m-d",strtotime($dob));
  $name=$_POST['NAME']; $team_id=$_POST['TEAM_ID'];
  $car_id=$_POST['CAR_ID'];
  $query = "INSERT INTO DRIVER VALUES ('$driver_id','$name','$dob','$car_id','$team_id')";
  $msg="add";
  $result=mysqli_query($conn,$query);
  if($result){
  	header('location:/formula1/driver.php?msg=' . $msg);
  }
}
if(isset($_GET['DRIVER_ID'])){
  /*Do nothing*/
} else { $dob=NULL; $name=NULL; $team_id=NULL; $car_id=NULL;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php'; ?>
<body>
 <?php include 'partial/driver_nav.php'; ?>
  <div class="container">
    <div class="formdiv">
    <div class="info"></div>
    <form method="POST" action="driver_add.php">
    	<div class="form-group-row">
    		<label for="DRIVER_ID" class="col-sm-3 col-form-label">Driver ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="DRIVER_ID" class="form-control" id="DRIVER_ID"/>	
    		</div>
    	</div>
      <div class="form-group-row">
        <label for="NAME" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-7">
        <input type="text" name="NAME" class="form-control" id="NAME" />  
        </div>
      </div>
    	<div class="form-group-row">
    		<label for="DOB" class="col-sm-3 col-form-label">DOB</label>
    		<div class="col-sm-7">
    		<input type="date" name="DOB" class="form-control" id="DOB" />	
    		</div>
    	</div>
      <div class="form-group-row">
        <label for="CAR_ID" class="col-sm-3 col-form-label">Car ID</label>
        <div class="col-sm-7">
        <input type="text" name="CAR_ID" class="form-control" id="CAR_ID" />  
        </div>
      </div>
    	<div class="form-group-row">
    		<label for="TEAM_ID" class="col-sm-3 col-form-label">Team ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="TEAM_ID" class="form-control" id="TEAM_ID" />	
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

