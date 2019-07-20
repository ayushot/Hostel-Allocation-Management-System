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
  $username = $_POST['username'];
  $password = $_POST['pwd'];

  if (empty($username) || empty($password)) {
    header("Location: ../login-hostel_manager.php?error=emptyfields");
    exit();
  }
  else {
    $sql = "SELECT *FROM Hostel_Manager WHERE Username = '$username' and pwd = '$password'";
    $result = mysqli_query($conn, $sql);
    
     $num = mysqli_num_rows($result);
     $row = mysqli_fetch_assoc($result);

     if($num == 1){

        //session_start();
        $_SESSION['hostel_man_id'] = $row['Hostel_man_id'];
        $_SESSION['fname'] = $row['Fname'];
        $_SESSION['lname'] = $row['Lname'];
        $_SESSION['mob_no'] = $row['Mob_no'];
        $_SESSION['username'] = $row['Username'];
        $_SESSION['hostel_id'] = $row['Hostel_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['isadmin'] = $row['Isadmin'];
        $_SESSION['PSWD'] = $row['Pwd'];

        //Just for checking if session variables are working properly
        if(isset($_SESSION['username'])){
          echo "<script type='text/javascript'>alert('Set')</script>";
        }
        else {
          echo "<script type='text/javascript'>alert('Not SET')</script>";
        }
        //echo $_SESSION['lname'];
        if($_SESSION['isadmin']==0){
          header("Location: ../home_manager.php?login=success");
        }
        else {
          header("Location: ../admin/admin_home.php?login=success");
          exit();
        }
        //exit();
      }
      else {
        header("Location: ../login-hostel_manager.php?error=strangeerr");
        exit();
      }
    }
    
  


