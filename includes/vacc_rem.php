<?php
    require 'config.inc.php';
    if(isset($_POST['rem-submit'])){
        $uname=$_POST['va_uname'];
        $pwd=$_POST['pwd'];
        $query="SELECT * FROM vadmin WHERE Isadmin='1'";
        $result=mysqli_query($conn,$query);
        $row=mysqli_fetch_assoc($result);
        $pwdcheck=password_verify($pwd,$row['Pwd']);
        if($pwdcheck==false){
            echo '<script type="text/javascript">'; 
            echo 'alert("Incorrect password!!");'; 
            echo 'window.location.href = "../admin/vacc_remove.php";';
            echo '</script>';
            exit();
        }
        else{
            echo $uname;
            $query1="DELETE FROM vadmin WHERE Va_id='$uname'";
            $result1=mysqli_query($conn,$query1);
            echo '<script type="text/javascript">'; 
            echo 'alert("Administrator Removed!!");'; 
            echo 'window.location.href = "../admin/vacc_remove.php";';
            echo '</script>';
            exit();
        }
    }
?>
