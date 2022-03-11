<?php 
require_once 'includes/db.php';
$query = "SELECT * FROM CAR";
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
 <?php include 'partial/car_nav.php'; ?>
   <div class="container">
<?php if (!empty($alert_msg)) {?>
  <div class="alert alert-success"><?php echo $alert_msg; ?></div>
<?php }?>
 <div class="info"></div>
  <table class="table">
    <thead>
        <tr>
           <th scope="col">Car ID</th>
           <th>Model</th>
           <th>Hours driven</th>
           <th>Team ID</th>
        </tr>
    </thead>
    <tbody>
      <?php
 if(!empty($records)) {
  while($row = mysqli_fetch_assoc($results)) {
  ?>
        <tr>
          <th scope="row"><?php echo $row['CAR_ID']; ?></th>
          <td><?php echo $row['MODEL']; ?></td>
          <td><?php echo $row['HOURS_DRIVEN']; ?></td>
          <td><?php echo $row['TEAM_ID']; ?></td>
          <td>
             <a href="/formula1/car_edit.php?CAR_ID=<?php echo $row['CAR_ID'];?>" class="btn btn-primary">Edit</a>
             <a href="/formula1/car_del.php?CAR_ID=<?php echo $row['CAR_ID'];?>" class="btn btn-danger" onClick="javascript: return confirm("Are you sure you want to delete this car's records?");">Delete</a>
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



