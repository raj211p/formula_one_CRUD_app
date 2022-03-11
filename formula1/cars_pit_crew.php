<?php 
require_once 'includes/db.php';
$query = "SELECT PIT_CREW_MEMBER.MEMBER_ID, PIT_CREW_MEMBER.NAME, CAR.CAR_ID, CAR.MODEL, PIT_CREW_MEMBER.TEAM_ID FROM PIT_CREW_CARS_WORKED_ON,PIT_CREW_MEMBER,CAR,TEAM WHERE CAR.CAR_ID=PIT_CREW_CARS_WORKED_ON.CAR_ID AND PIT_CREW_MEMBER.MEMBER_ID=PIT_CREW_CARS_WORKED_ON.MEMBER_ID AND PIT_CREW_MEMBER.TEAM_ID=TEAM.TEAM_ID AND CAR.TEAM_ID=TEAM.TEAM_ID ";
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
 <?php include 'partial/cars_pit_crew_nav.php'; ?>
   <div class="container">
<?php if (!empty($alert_msg)) {?>
  <div class="alert alert-success"><?php echo $alert_msg; ?></div>
<?php }?>
 <div class="info"></div>
  <table class="table">
    <thead>
        <tr>
           <th scope="col">Member ID</th>
	         <th>Member name</th>
	         <th>Car ID</th>
           <th>Model</th>
           <th>Team ID</th>
        </tr>
    </thead>
    <tbody>
      <?php
 if(!empty($records)) {
  while($row = mysqli_fetch_assoc($results)) {
  ?>
        <tr>
          <th scope="row"><?php echo $row['MEMBER_ID']; ?></th>
	  <td><?php echo $row['NAME']; ?></th>
	  <td><?php echo $row['CAR_ID']; ?></th>
          <td><?php echo $row['MODEL']; ?></td>
          <td><?php echo $row['TEAM_ID']; ?></td>
          <td>
             <a href="/formula1/cars_pit_crew_edit.php?CAR_ID=<?php echo $row['CAR_ID'];?>&MEMBER_ID=<?php echo $row['MEMBER_ID'];?>" class="btn btn-primary">Edit</a>
             <a href="/formula1/cars_pit_crew_del.php?CAR_ID=<?php echo $row['CAR_ID'];?>&MEMBER_ID=<?php echo $row['MEMBER_ID'];?>" class="btn btn-danger" onClick="javascript: return confirm("Are you sure you want to delete this record?");">Delete</a>
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



