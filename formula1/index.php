<?php 
require_once 'includes/db.php';
$query = "SELECT * FROM TEAM";
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
 <?php include 'partial/nav.php'; ?>
   <div class="container">
<?php if (!empty($alert_msg)) {?>
  <div class="alert alert-success"><?php echo $alert_msg; ?></div>
<?php }?>
 <div class="info"></div>
  <table class="table">
    <thead>
        <tr>
           <th scope="col">Team ID</th>
           <th>Name</th>
           <th>Drivers</th>
           <th>Pit crew</th>
           <th>Cars</th>
        </tr>
    </thead>
    <tbody>
      <?php
 if(!empty($records)) {
  while($row = mysqli_fetch_assoc($results)) {
  ?>
        <tr>
          <th scope="row"><?php echo $row['TEAM_ID']; ?></th>
          <td><?php echo $row['TEAM_NAME']; ?></td>
          <td><?php echo $row['NO_OF_DRIVERS']; ?></td>
          <td><?php echo $row['NO_OF_PIT_CREW']; ?></td>
          <td><?php echo $row['NO_OF_CARS']; ?></td>
          <td>
             <a href="/formula1/team_edit.php?TEAM_ID=<?php echo $row['TEAM_ID'];?>" class="btn btn-primary">Edit</a>
             <a href="/formula1/team_del.php?TEAM_ID=<?php echo $row['TEAM_ID'];?>" class="btn btn-danger" onClick="javascript: return confirm("Are you sure you want to delete this team's records?");">Delete</a>
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


