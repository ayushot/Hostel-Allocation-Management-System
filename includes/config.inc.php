<?php
  session_start();
 
  $dBName = 'hostel_management_system';
 // session_start();
  $conn=mysqli_connect('localhost','root');

  if(!$conn){
  	echo" connection unsuccessful";
  }
  
  mysqli_select_db($conn, 'hostel_management_system');
?>
