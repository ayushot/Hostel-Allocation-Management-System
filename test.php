<?php
  session_start();
  $conn = mysqli_connect('localhost','root');
  if($conn){
  echo" connection successful";
  }
  else{
  echo " no connection";
 }
 mysqli_select_db($conn, 'hostel_management_system');


  $hashPwd = password_hash('root', PASSWORD_DEFAULT);
  $sql = "INSERT INTO Hostel_Manager (Username, Fname, Lname, Mob_no, Hostel_id, Pwd, Isadmin) VALUES ('', 'deepika', 'padukone', '8891735573', 2, '$hashPwd', 0)";
  $result = mysqli_query($conn, $sql);
  if(!$result){
    echo mysqli_error($conn);
  }
 ?>
