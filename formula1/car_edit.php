<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $car_id=$_POST['CAR_ID']; $model=$_POST['MODEL'];
  $hours_driven=$_POST['HOURS_DRIVEN']; $team_id=$_POST['TEAM_ID'];
  $query = "UPDATE CAR SET HOURS_DRIVEN='$hours_driven' WHERE CAR_ID='$car_id'";
  $msg="edit";
  $result=mysqli_query($conn,$query);
  if($result){
  	header('location:/formula1/car.php?msg=' . $msg);
  }
}
if(isset($_GET['CAR_ID']) && $_GET['CAR_ID']!=NULL){
  require_once 'includes/db.php';
  $car_id=$_GET['CAR_ID']; $query="SELECT * FROM CAR WHERE CAR_ID='$car_id'";
  $res=mysqli_query($conn,$query); 
  $results=mysqli_fetch_row($res);
  $model=$results[1];
  $hours_driven=$results[2]; $team_id=$results[3];
  
} else { $model=NULL;
  $hours_driven=NULL; $team_id=NULL; 
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php'; ?>
<body>
 <?php include 'partial/car_nav.php'; ?>
  <div class="container">
    <div class="formdiv">
    <div class="info"></div>
    <form method="POST" action="car_edit.php">
    	<div class="form-group-row">
    		<label for="CAR_ID" class="col-sm-3 col-form-label">Car ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="CAR_ID" class="form-control" id="CAR_ID" value="<?php echo $car_id; ?>" readonly/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="MODEL" class="col-sm-3 col-form-label">Model</label>
    		<div class="col-sm-7">
    		<input type="text" name="MODEL" class="form-control" id="MODEL" value="<?php echo $model; ?>" readonly/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="HOURS_DRIVEN" class="col-sm-3 col-form-label">Hours driven</label>
    		<div class="col-sm-7">
    		<input type="text" name="HOURS_DRIVEN" class="form-control" id="HOURS_DRIVEN" value="<?php echo $hours_driven; ?>" />	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="TEAM_ID" class="col-sm-3 col-form-label">Team ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="TEAM_ID" class="form-control" id="TEAM_ID" value="<?php echo $team_id; ?>" readonly/>	
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
