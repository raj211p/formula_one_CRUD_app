<?php 
if(isset($_POST['submit']) && $_POST['submit']!='')
{
  require_once 'includes/db.php';
  $member_id=$_POST['MEMBER_ID']; $dob=$_POST['DOB']; 
  $dob=date("Y-m-d",strtotime($dob));
  $name=$_POST['NAME']; $team_id=$_POST['TEAM_ID'];
  $joined_on=$_POST['JOINED_ON'];
  $query = "UPDATE PIT_CREW_MEMBER SET TEAM_ID='$team_id' WHERE MEMBER_ID='$member_id'";
  $msg="edit";
  $result=mysqli_query($conn,$query);
  if($result){
    header('location:/formula1/pit_crew.php?msg=' . $msg);
  }
}
if(isset($_GET['MEMBER_ID']) && $_GET['MEMBER_ID']!=NULL){
  require_once 'includes/db.php';
  $member_id=$_GET['MEMBER_ID']; $query="SELECT * FROM PIT_CREW_MEMBER WHERE MEMBER_ID='$member_id'";
  $res=mysqli_query($conn,$query); 
  $results=mysqli_fetch_row($res);
  $name=$results[2]; $dob=$results[1];  $team_id=$results[3]; $joined_on=$results[4];
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
    <form method="POST" action="pit_crew_edit.php">
      <div class="form-group-row">
        <label for="MEMBER_ID" class="col-sm-3 col-form-label">Member ID</label>
        <div class="col-sm-7">
        <input type="text" name="MEMBER_ID" class="form-control" id="MEMBER_ID" value="<?php echo $member_id; ?>" readonly/> 
        </div>
      </div>
      <div class="form-group-row">
        <label for="DOB" class="col-sm-3 col-form-label">DOB</label>
        <div class="col-sm-7">
        <input type="date" name="DOB" class="form-control" id="DOB" value="<?php echo $dob; ?>" readonly/>  
        </div>
      </div>
      <div class="form-group-row">
        <label for="NAME" class="col-sm-3 col-form-label">Name</label>
        <div class="col-sm-7">
        <input type="text" name="NAME" class="form-control" id="NAME" value="<?php echo $name; ?>" readonly/>  
        </div>
      </div>
      <div class="form-group-row">
        <label for="TEAM_ID" class="col-sm-3 col-form-label">Team ID</label>
        <div class="col-sm-7">
        <input type="text" name="TEAM_ID" class="form-control" id="TEAM_ID" value="<?php echo $team_id; ?>" />  
        </div>
      </div>
      <div class="form-group-row">
        <label for="JOINED_ON" class="col-sm-3 col-form-label">Joined on</label>
        <div class="col-sm-7">
        <input type="date" name="JOINED_ON" class="form-control" id="JOINED_ON" value="<?php echo $joined_on; ?>" readonly/>  
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
