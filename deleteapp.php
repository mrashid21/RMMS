<?php

$con = mysqli_connect("localhost","root","","rmms");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

$id=$_REQUEST['id'];
$query = "DELETE FROM appointment WHERE AppointmentID=$id"; 
$result = mysqli_query($con,$query) or die ( mysqli_error());
header("Location: schedule.php"); 
?>