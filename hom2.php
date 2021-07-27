
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SVD</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<?php
    require 'includes/config.inc.php';
    require_once 'includes/auth_check.php';
    if(isset($_POST['submit1'])){
        $id=$_SESSION['roll'];
        $date=$_POST['date'];
        date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d");
        if($today>$date){
            echo '<script type="text/javascript">'; 
            echo 'alert("Please Choose a valid date");'; 
            echo 'window.location.href = "home.php";';
            echo '</script>';
        }
?>
<div class="table-box">
   	   <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Vaccine</th>
        <th>Available Doses</th> 
      </tr>
    </thead>
    <tbody>
<?php   $query1="SELECT * FROM dates WHERE Date='$date'";
        $result1=mysqli_query($conn,$query1);
        if(mysqli_num_rows($result1)>0){
            while($row1 = mysqli_fetch_assoc($result1)){
                $vacc_id=$row1['Vacc_id'];
                $query2="SELECT * FROM vaccines WHERE Vacc_id='$vacc_id'";
                $result2=mysqli_query($conn,$query2);
                $row2=mysqli_fetch_assoc($result2);
                $vacc_name=$row2['Vacc_name'];
                $avail=$row1['Avail_doses'];
                echo nl2br("<tr><td>{$date}</td><td>{$vacc_name}</td><td>{$avail}</td></tr>\n");
            }
        }
        else{
            echo '<script type="text/javascript">'; 
            echo 'alert("available doses havent been updated by the administrator");'; 
            echo 'window.location.href = "home.php";';
            echo '</script>';
            exit();
        }
    }
    else{
        $id=$_SESSION['roll'];
        $date=$_POST['date'];
        $_SESSION['date']=$date;
        date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d");
        if($today>$date){
            echo '<script type="text/javascript">'; 
            echo 'alert("Please Choose a valid date");'; 
            echo 'window.location.href = "home.php";';
            echo '</script>';
        }
        else{
            $query1="SELECT * FROM dates WHERE Date='$date'";
            $result1=mysqli_query($conn,$query1);
            if(mysqli_num_rows($result1)>0){
                header('Location: schedule1.php');
            }
            else{
                echo '<script type="text/javascript">'; 
                echo 'alert("Cant schedule vaccine available doses havent been updated by the administrator");'; 
                echo 'window.location.href = "home.php";';
                echo '</script>';
                exit();
            }
        }
    }
?>
</tbody>
  </table>
</div>
 
</body>
</html>