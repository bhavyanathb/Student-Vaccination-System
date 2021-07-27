<?php
    require 'includes/config.inc.php';
    require_once 'includes/auth_check.php';
?>
<!DOCTYPE html>
<html>
<title>SVD</title>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css" >
</head>
<body>
    <div class="tablebox">
    <h1>Student Vaccination Drive</h1>
        <h2>Students Scheduled today</h2>
        <div class="topnav">
            <a class="profile" href="vacc_admin.php">Home</a>
            <a class="profile" href="vacc_profile.php">My Profile</a>
            <a class="profile" href="includes/logout.inc.php">Logout</a>
        </div>
        <br>
    <table class="table">
    <thead>
      <tr>
        <th>Student roll</th>
        <th>Student name</th>
      </tr>
    </thead>
    <tbody>
        <?php
            date_default_timezone_set('Asia/Kolkata');
            $today = date("Y-m-d"); 
            $query="SELECT * FROM booking WHERE Date_of_allot='$today' and Vaccinated='0'";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                //echo "bhavya";
                while($row = mysqli_fetch_assoc($result)){
                    $roll=$row['Std_id'];
                    $query1="SELECT * FROM student WHERE Std_id='$roll'";
                    $result1=mysqli_query($conn,$query1);
                    $row1=mysqli_fetch_assoc($result1);
                    $sname=$row1['Fname']." ".$row1['Lname'];
                    echo nl2br("<tr><td>{$roll}</td><td>{$sname}</td></tr>\n");
                }
            }
            else{
                echo '<script type="text/javascript">'; 
                echo 'alert("No scheduled students left");'; 
                echo 'window.location.href = "vacc_admin.php";';
                echo '</script>';
                exit();
            }
            
        ?>
    </tbody>    
    </table>
    </div>
</body>
</html>