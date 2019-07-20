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

  $roll = $_POST['student_roll_no'];
  $fname = $_POST['student_fname'];
  $lname = $_POST['student_lname'];
  $mobile = $_POST['mobile_no'];
  $dept = $_POST['department'];
  $year = $_POST['year_of_study'];
  $password = $_POST['pwd'];
  $cnfpassword = $_POST['confirmpwd'];

  if(!preg_match("/^[a-zA-Z0-9]*$/",$roll)){
    header("Location: ../signup.php?error=invalidroll");
    exit();
  }
  else if($password !== $cnfpassword){
    header("Location: ../signup.php?error=passwordcheck");
    exit();
  }
  else{



    $q = "SELECT * FROM Student WHERE Student_id= '$roll' ";
    $result = mysqli_query($conn, $q);

     $num = mysqli_num_rows($result);

     if($num == 1){
     echo" duplicate data ";
     header("Location: ../signup.php?error=duplicate data");
    exit();
      }
      else{
       $qy = "INSERT INTO Student (Student_id, Fname, Lname, Mob_no, Dept, Year_of_study, Pwd) VALUES ('".$roll."', '".$fname."', '".$lname."', '".$mobile."', '".$dept."', '".$year."', '".$password."')";
       
mysqli_query($conn, $qy);
  echo "data inserted";
   header('location: ../index.php');
   exit();
}}

?>
 