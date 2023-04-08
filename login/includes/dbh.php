<?php
$con=mysqli_connect("localhost","root","","loginsystem");
$sSQL="SET CHARACTER SET utf8";
mysqli_query($con,$sSQL);
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
 ?>