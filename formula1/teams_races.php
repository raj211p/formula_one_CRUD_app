<?php 
require_once 'includes/db.php';
$query = "SELECT TEAM.TEAM_ID, TEAM.TEAM_NAME, RACE.RACE_ID, RACE.LOCATION, PARTICIPATES_IN.POSITION, RACE.RACE_DATE FROM PARTICIPATES_IN,RACE,TEAM WHERE RACE.RACE_ID=PARTICIPATES_IN.RACE_ID AND TEAM.TEAM_ID=PARTICIPATES_IN.TEAM_ID ";
$results=mysqli_query($conn,$query);
$records=mysqli_num_rows($results);
$msg="";
if(!empty($_GET['msg'])){
  $msg= $_GET['msg'];
  $alert_msg = ($msg == "add") ? "Record added." : (($msg == "del") ? "Record deleted." : "Record updated.");
} else {
 $alert_msg="";
}
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'partial/head.php'; ?>
<body>
 <?php include 'partial/teams_races_nav.php'; ?>
   <div class="container">
<?php if (!empty($alert_msg)) {?>
  <div class="alert alert-success"><?php echo $alert_msg; ?></div>
<?php }?>
 <div class="info"></div>
  <table class="table">
    <thead>
        <tr>
           <th scope="col">Team ID</th>
	   <th>Team name</th>
	   <th>Race ID</th>
           <th>Location</th>
           <th>Race date</th>
	   <th>Position</th>
        </tr>
    </thead>
    <tbody>
      <?php
 if(!empty($records)) {
  while($row = mysqli_fetch_assoc($results)) {
  ?>
        <tr>
          <th scope="row"><?php echo $row['TEAM_ID']; ?></th>
	  <td><?php echo $row['TEAM_NAME']; ?></th>
	  <td><?php echo $row['RACE_ID']; ?></th>
          <td><?php echo $row['LOCATION']; ?></td>
          <td><?php echo $row['RACE_DATE']; ?></td>
	  <td><?php echo $row['POSITION']; ?></td>
          <td>
             <a href="/formula1/teams_races_edit.php?TEAM_ID=<?php echo $row['TEAM_ID'];?>&RACE_ID=<?php echo $row['RACE_ID'];?>&POSITION=<?php echo $row['POSITION'];?>" class="btn btn-primary">Edit</a>
             <a href="/formula1/teams_races_del.php?TEAM_ID=<?php echo $row['TEAM_ID'];?>&RACE_ID=<?php echo $row['RACE_ID'];?>" class="btn btn-danger" onClick="javascript: return confirm("Are you sure you want to delete this record?");">Delete</a>
          </td>
        </tr>
       <?php
}
}
?>
    </tbody>
   </table>
  </div>
 </body>
</html> 




