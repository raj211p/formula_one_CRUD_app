<?php 
require_once 'includes/db.php';
$query = "SELECT * FROM RACE";
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
<?php include "partial/head.php"; ?>
<body>
 <?php include "partial/race_nav.php"; ?>
   <div class="container">
<?php if (!empty($alert_msg)) {?>
  <div class="alert alert-success"><?php echo $alert_msg; ?></div>
<?php }?>
 <div class="info"></div>
  <table class="table">
    <thead>
        <tr>
           <th scope="col">Race ID</th>
           <th>Laps</th>
           <th>Date</th>
           <th>Time</th>
           <th>Location</th>
        </tr>
    </thead>
    <tbody>
      <?php
 if(!empty($records)) {
  while($row = mysqli_fetch_assoc($results)) {
  ?>
        <tr>
          <th scope="row"><?php echo $row['RACE_ID']; ?></th>
          <td><?php echo $row['NO_OF_LAPS']; ?></td>
          <td><?php echo $row['RACE_DATE']; ?></td>
          <td><?php echo $row['START_TIME']; ?></td>
          <td><?php echo $row['LOCATION']; ?></td>
          <td>
             <a href="/formula1/race_edit.php?RACE_ID=<?php echo $row['RACE_ID'];?>" class="btn btn-primary">Edit</a>
             <a href="/formula1/race_del.php?RACE_ID=<?php echo $row['RACE_ID'];?>" class="btn btn-danger" onClick="javascript: return confirm("Are you sure you want to delete the records of this race?");">Delete</a>
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
