<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $car_id=$_POST['CAR_ID']; $member_id=$_POST['MEMBER_ID']; $new_car_id=$_POST['NEW_CAR_ID'];
  $query = "UPDATE PIT_CREW_CARS_WORKED_ON SET CAR_ID='$new_car_id' WHERE MEMBER_ID='$member_id' AND CAR_ID='$car_id'";
  $msg="edit";
  $result=mysqli_query($conn,$query);
  if($result){
  	header('location:/formula1/cars_pit_crew.php?msg=' . $msg);
  }
}
if(isset($_GET['CAR_ID']) && $_GET['CAR_ID']!=NULL && isset($_GET['MEMBER_ID']) && $_GET['MEMBER_ID']!=NULL){
  require_once 'includes/db.php';
  $member_id=$_GET['MEMBER_ID'];
  $car_id=$_GET['CAR_ID'];
  
} else { $member_id=NULL; $car_id=NULL; 
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php'; ?>
<body>
 <?php include 'partial/cars_pit_crew_nav.php'; ?>
  <div class="container">
    <div class="formdiv">
    <div class="info"></div>
    <form method="POST" action="cars_pit_crew_edit.php">
	<div class="form-group-row">
    		<label for="MEMBER_ID" class="col-sm-3 col-form-label">Member ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="MEMBER_ID" class="form-control" id="MEMBER_ID" value="<?php echo $member_id; ?>" readonly/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="CAR_ID" class="col-sm-3 col-form-label">Car ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="CAR_ID" class="form-control" id="CAR_ID" value="<?php echo $car_id; ?>" readonly/>	
    		</div>
    	</div>   
      	<div class="form-group-row">
        		<label for="NEW_CAR_ID" class="col-sm-3 col-form-label" style="white-space: :nowrap">New car ID</label>
        		<div class="col-sm-7">
        		<input type="text" name="NEW_CAR_ID" class="form-control" id="NEW_CAR_ID"/> 
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

