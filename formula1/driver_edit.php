<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $driver_id=$_POST['DRIVER_ID']; $dob=$_POST['DOB']; 
  $dob=date("Y-m-d",strtotime($dob));
  $name=$_POST['NAME']; $team_id=$_POST['TEAM_ID'];
  $car_id=$_POST['CAR_ID'];
  
  $query = "UPDATE DRIVER SET TEAM_ID='$team_id', CAR_ID='$car_id' WHERE DRIVER_ID='$driver_id'";
  $msg="edit";
  $result=mysqli_query($conn,$query);
  if($result){
    header('location:/formula1/driver.php?msg=' . $msg);
  }
}
if(isset($_GET['DRIVER_ID']) && $_GET['DRIVER_ID']!=NULL){
  require_once 'includes/db.php';
  $driver_id=$_GET['DRIVER_ID']; $query="SELECT * FROM DRIVER WHERE DRIVER_ID='$driver_id'";
  $res=mysqli_query($conn,$query); 
  $results=mysqli_fetch_row($res);
  $dob=$results[2];
  $name=$results[1]; $team_id=$results[4];
  $car_id=$results[3];
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
    <form method="POST" action="driver_edit.php">
      <div class="form-group-row">
        <label for="DRIVER_ID" class="col-sm-3 col-form-label">Driver ID</label>
        <div class="col-sm-7">
        <input type="text" name="DRIVER_ID" class="form-control" id="DRIVER_ID" value="<?php echo $driver_id; ?>" readonly/> 
        </div>
      </div>
      <div class="form-group-row">
        <label for="NAME" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-7">
        <input type="text" name="NAME" class="form-control" id="NAME" value="<?php echo $name; ?>" readonly/>  
        </div>
      </div>
      <div class="form-group-row">
        <label for="DOB" class="col-sm-3 col-form-label">DOB</label>
        <div class="col-sm-7">
        <input type="date" name="DOB" class="form-control" id="DOB" value="<?php echo $dob; ?>" readonly/>  
        </div>
      </div>
      <div class="form-group-row">
        <label for="CAR_ID" class="col-sm-3 col-form-label">Car ID</label>
        <div class="col-sm-7">
        <input type="text" name="CAR_ID" class="form-control" id="CAR_ID" value="<?php echo $car_id; ?>" />  
        </div>
      </div>
      <div class="form-group-row">
        <label for="TEAM_ID" class="col-sm-3 col-form-label">Team ID</label>
        <div class="col-sm-7">
        <input type="text" name="TEAM_ID" class="form-control" id="TEAM_ID" value="<?php echo $team_id; ?>" />  
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
