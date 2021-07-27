<?php

if (isset($_POST['login-submit'])) {

  require 'config.inc.php';

  $uname = $_POST['va_uname'];
  $password = $_POST['pwd'];

  if (empty($uname) || empty($password)) {
    echo '<script type="text/javascript">'; 
    echo 'alert("Please enter values in the fields");'; 
    echo 'window.location.href = "../index.php";';
    echo '</script>';
    exit();
  }
  else {
    $sql = "SELECT *FROM vadmin WHERE Va_id = '$uname'";
    $result = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($result)){
      $pwdCheck = password_verify($password, $row['Pwd']);
      if($pwdCheck == false){
        echo '<script type="text/javascript">'; 
        echo 'alert("Incorrect password!!");'; 
        echo 'window.location.href = "../va_login.php";';
        echo '</script>';
        exit();
      }
      else if($pwdCheck == true) {

        //session_start();
        $_SESSION['uname'] = $row['Va_id'];
        $_SESSION['fname'] = $row['Fname'];
        $_SESSION['lname'] = $row['Lname'];
        $_SESSION['mob_no'] = $row['Mob_no'];
        $_SESSION['email'] = $row['Email'];
        $_SESSION['vacc_id'] = $row['Vacc_id'];
        $_SESSION['login']='1';
        //echo $_SESSION['lname'];
        if($row['Isadmin']==0){
            header("Location:../vacc_admin.php?login=success");
        }
        else{
            header("Location: ..//admin/admin_home.php?login=success");
        }
        //exit();
      }
      else {
        header("Location: ../index.php?error=strangeerr");
        exit();
      }
    }
    else{
      echo '<script type="text/javascript">'; 
      echo 'alert(" Wrong Username (or) Admin Have not appointed you yet!!");'; 
      echo 'window.location.href = "../va_login.php";';
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
