<?php 
require_once 'includes/db.php';
$query = "SELECT * FROM PIT_CREW_MEMBER";
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
 <?php include 'partial/pit_crew_nav.php'; ?>
   <div class="container">
<?php if (!empty($alert_msg)) {?>
  <div class="alert alert-success"><?php echo $alert_msg; ?></div>
<?php }?>
 <div class="info"></div>
  <table class="table">
    <thead>
        <tr>
           <th scope="col">Emp. ID</th>
           <th>DOB</th>
           <th>Name</th>
           <th>Team ID</th>
           <th>Joined on</th>
        </tr>
    </thead>
    <tbody>
      <?php
 if(!empty($records)) {
  while($row = mysqli_fetch_assoc($results)) {
  ?>
        <tr>
          <th scope="row"><?php echo $row['MEMBER_ID']; ?></th>
          <td><?php echo $row['DOB']; ?></td>
          <td><?php echo $row['NAME']; ?></td>
          <td><?php echo $row['TEAM_ID']; ?></td>
          <td><?php echo $row['JOINED_ON']; ?></td>
          <td>
             <a href="/formula1/pit_crew_edit.php?MEMBER_ID=<?php echo $row['MEMBER_ID'];?>" class="btn btn-primary">Edit</a>
             <a href="/formula1/pit_crew_del.php?MEMBER_ID=<?php echo $row['MEMBER_ID'];?>" class="btn btn-danger" onClick="javascript: return confirm("Are you sure you want to delete this employee's records?");">Delete</a>
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




