<?php

if (isset($_POST['signup-submit'])) {

  require 'config.inc.php';

  $roll = $_POST['student_roll_no'];
  $fname = $_POST['student_fname'];
  $lname = $_POST['student_lname'];
  $mobile = $_POST['mobile_no'];
  $email=$_POST['email'];
  $dept = $_POST['department'];
  $year = $_POST['year_of_study'];
  $age=$_POST['age'];
  $password = $_POST['pwd'];
  $cnfpassword = $_POST['confirmpwd'];

  if(!preg_match("/^[a-zA-Z0-9]*$/",$roll)){
    echo '<script type="text/javascript">'; 
    echo 'alert("Invalid RollNo!!");'; 
    echo 'window.location.href = "../signup.php";';
    echo '</script>';
    exit();
  }
  else if($password !== $cnfpassword){
    echo '<script type="text/javascript">'; 
    echo 'alert("Entered Passwords havent matched!!");'; 
    echo 'window.location.href = "../signup.php";';
    echo '</script>';
    exit();
  }
  else {

    $sql = "SELECT Std_id FROM student WHERE Std_id=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
      header("Location: ../signup.php?error=sqlerror");
      exit();
    }
    else {
      mysqli_stmt_bind_param($stmt, "s", $roll);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_store_result($stmt);
      $resultCheck = mysqli_stmt_num_rows($stmt);
      if ($resultCheck > 0) {
        echo '<script type="text/javascript">'; 
        echo 'alert("User Exists!!");'; 
        echo 'window.location.href = "../index.php";';
        echo '</script>';
        exit();
      }
      else {
        $sql = "INSERT INTO student (Std_id, Fname, Lname, Mob_no, Email, Dept, Year_of_study, Pwd, Age) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
          echo "hello";
          header("Location: ../signup.php?error=sqlerror");
          exit();
        }
        else {

          $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

          mysqli_stmt_bind_param($stmt, "sssssssss",$roll, $fname, $lname, $mobile, $email, $dept, $year, $hashedPwd, $age);
          mysqli_stmt_execute($stmt);
          header("Location: ../index.php?signup=success");
          exit();
        }
      }
    }

  }
  mysqli_stmt_close($stmt);
  mysqli_close($conn);
}
else {
  header("Location: ../signup.php");
  exit();
}
