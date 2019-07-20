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
  $password = $_POST['pwd'];

  if (empty($roll) || empty($password)) {
    header("Location: ../index.php?error=emptyfields");
    exit();
  }
  else {
    $sql = " SELECT * FROM Student WHERE Student_id = '$roll' and pwd = '$password'";
    $result = mysqli_query($conn, $sql);
     $num = mysqli_num_rows($result);
     $row = mysqli_fetch_assoc($result);
     if($num == 1){

      
    

        //session_start();
        $_SESSION['roll'] = $row['Student_id'];
        $_SESSION['fname'] = $row['Fname'];
        $_SESSION['lname'] = $row['Lname'];
        $_SESSION['mob_no'] = $row['Mob_no'];
        $_SESSION['department'] = $row['Dept'];
        $_SESSION['year_of_study'] = $row['Year_of_study'];
        $_SESSION['hostel_id'] = $row['Hostel_id'];
        $_SESSION['room_id'] = $row['Room_id'];
          if(isset($_SESSION['department'])){
          echo "<script type='text/javascript'>alert('Set')</script>";
        }
        else {
          echo "<script type='text/javascript'>alert('Not SET')</script>";
        }
        
        header("Location: ../home.php");
        echo "succesful login";
        //exit();
      }
      else {
        header("Location: ../index.php?error=stranger");
        exit();
      }
    }
    
?>