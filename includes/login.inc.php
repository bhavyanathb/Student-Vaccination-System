<?php

 

if (isset($_POST['login-submit'])) {

  require 'config.inc.php';

  $roll = $_POST['student_roll_no'];
  $password = $_POST['pwd'];

  if (empty($roll) || empty($password)) {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please enter values in the fields");'; 
    echo 'window.location.href = "../index.php";';
    echo '</script>';
    exit();
  }
  else {
    $sql = "SELECT *FROM student WHERE Std_id = '$roll'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
      $pwdCheck = password_verify($password, $row['Pwd']);
      if($pwdCheck == false){
        echo '<script type="text/javascript">'; 
        echo 'alert("Incorrect password!!");'; 
        echo 'window.location.href = "../index.php";';
        echo '</script>';
        exit();
      }
      else if($pwdCheck == true) {

        //session_start();
        $_SESSION['roll'] = $row['Std_id'];
        $_SESSION['fname'] = $row['Fname'];
        $_SESSION['lname'] = $row['Lname'];
        $_SESSION['mob_no'] = $row['Mob_no'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['department'] = $row['Dept'];
        $_SESSION['year_of_study'] = $row['Year_of_study'];
        $_SESSION['age'] = $row['Age'];
        $_SESSION['status'] = $row['Status'];
        $_SESSION['login']='1';
        //echo $_SESSION['lname'];
        header("Location: ..//home.php?login=success");
        //exit();
      }
      else {
        header("Location: ../index.php?error=strangeerr");
        exit();
      }
    }
    else{
      echo '<script type="text/javascript">'; 
      echo 'alert("Please Signup!!");'; 
      echo 'window.location.href = "../index.php";';
      echo '</script>';
      //exit();
      exit();
    }
  }

}
else {
  header("Location: ../index.php");
  exit();
}
