<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $race_id=$_POST['RACE_ID']; $no_of_laps=$_POST['NO_OF_LAPS'];
  $race_date=$_POST['RACE_DATE']; $race_date=date("Y-m-d",strtotime($race_date));
  $start_time=$_POST['START_TIME']; 
  $start_time=date("H:i:s",strtotime($start_time));
  $location=$_POST['LOCATION']; 
  $query = "INSERT INTO RACE VALUES ('$race_id','$no_of_laps','$race_date','$start_time','$location')";
  $msg="add";
  $result=mysqli_query($conn,$query);
  if($result){
  	header('location:/formula1/race.php?msg=' . $msg);
  }
}
if(isset($_GET['RACE_ID'])){
  /*Do nothing*/
} else { $race_id=NULL; $no_of_laps=NULL;
  $race_date=NULL; $start_time=NULL;
  $location=NULL; 
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php'; ?>
<body>
 <?php include 'partial/race_nav.php'; ?>
  <div class="container">
    <div class="formdiv">
    <div class="info"></div>
    <form method="POST" action="race_add.php">
    	<div class="form-group-row">
    		<label for="RACE_ID" class="col-sm-3 col-form-label">Race ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="RACE_ID" class="form-control" id="RACE_ID"/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="NO_OF_LAPS" class="col-sm-3 col-form-label">Laps</label>
    		<div class="col-sm-7">
    		<input type="text" name="NO_OF_LAPS" class="form-control" id="NO_OF_LAPS"/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="RACE_DATE" class="col-sm-3 col-form-label">Date</label>
    		<div class="col-sm-7">
    		<input type="date" name="RACE_DATE" class="form-control" id="RACE_DATE" />	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="START_TIME" class="col-sm-3 col-form-label">Time</label>
    		<div class="col-sm-7">
    		<input type="time" name="START_TIME" class="form-control" id="START_TIME"/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="LOCATION" class="col-sm-3 col-form-label">Location</label>
    		<div class="col-sm-7">
    		<input type="text" name="LOCATION" class="form-control" id="LOCATION"/>	
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
