<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $car_id=$_POST['CAR_ID']; $member_id=$_POST['MEMBER_ID'];
  $query = "INSERT INTO PIT_CREW_CARS_WORKED_ON VALUES ('$member_id','$car_id')";
  $msg="add";
  $result=mysqli_query($conn,$query);
  if($result){
  	header('location:/formula1/cars_pit_crew.php?msg=' . $msg);
  }
}
if(isset($_GET['CAR_ID']) && isset($_GET['MEMBER_ID'])){
  /*Do nothing*/
} else { $car_id=NULL; $member_id=NULL; 
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
    <form method="POST" action="cars_pit_crew_add.php">
    	<div class="form-group-row">
    		<label for="CAR_ID" class="col-sm-3 col-form-label">Car ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="CAR_ID" class="form-control" id="CAR_ID"/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="MEMBER_ID" class="col-sm-3 col-form-label">Member ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="MEMBER_ID" class="form-control" id="MEMBER_ID" />	
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
