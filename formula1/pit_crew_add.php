<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $member_id=$_POST['MEMBER_ID']; $dob=$_POST['DOB']; $dob=date("Y-m-d",strtotime($dob));
  $name=$_POST['NAME']; $team_id=$_POST['TEAM_ID'];
  $joined_on=$_POST['JOINED_ON'];
  $query = "INSERT INTO PIT_CREW_MEMBER VALUES ('$member_id','$dob','$name','$team_id','$joined_on')";
  $msg="add";
  $result=mysqli_query($conn,$query);
  if($result){
  	header('location:/formula1/pit_crew.php?msg=' . $msg);
  }
}
if(isset($_GET['MEMBER_ID'])){
  /*Do nothing*/
} else { $dob=NULL; $name=NULL; $team_id=NULL; $joined_on=NULL;
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php'; ?>
<body>
 <?php include 'partial/pit_crew_nav.php'; ?>
  <div class="container">
    <div class="formdiv">
    <div class="info"></div>
    <form method="POST" action="pit_crew_add.php">
    	<div class="form-group-row">
    		<label for="MEMBER_ID" class="col-sm-3 col-form-label">Member ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="MEMBER_ID" class="form-control" id="MEMBER_ID"/>	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="DOB" class="col-sm-3 col-form-label">DOB</label>
    		<div class="col-sm-7">
    		<input type="date" name="DOB" class="form-control" id="DOB" />	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="NAME" class="col-sm-3 col-form-label">Name</label>
    		<div class="col-sm-7">
    		<input type="text" name="NAME" class="form-control" id="NAME" />	
    		</div>
    	</div>
    	<div class="form-group-row">
    		<label for="TEAM_ID" class="col-sm-3 col-form-label">Team ID</label>
    		<div class="col-sm-7">
    		<input type="text" name="TEAM_ID" class="form-control" id="TEAM_ID" />	
    		</div>
    	</div>
      <div class="form-group-row">
        <label for="JOINED_ON" class="col-sm-3 col-form-label">Joined on</label>
        <div class="col-sm-7">
        <input type="date" name="JOINED_ON" class="form-control" id="JOINED_ON" />  
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

