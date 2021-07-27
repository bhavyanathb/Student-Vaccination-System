<?php
    require '../includes/config.inc.php';
    require_once '../includes/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<title>SVD</title>
<head>
    <link rel="stylesheet" type="text/css" href="../css/style.css" >
</head>
<body>
<div class="adminbox">
    <h1>Student Vaccination Drive</h1>
    <div class="topnav">
    <a class="profile" href="admin_home.php">Home</a>
    <a class="profile" href="vacc_appoint.php">Appoint Administrator</a>
    <a class="profile" href="vacc_remove.php">remove Administrator</a>
    <a class="profile" href="../includes/logout.inc.php">Logout</a>
    </div>
    <br>
    <table class="table">
    <thead>
      <tr>
        <th>Student roll</th>
        <th>Student name</th>
        <th>Vaccinated</th>
      </tr>
    </thead>
    <tbody>
        <?php
            date_default_timezone_set('Asia/Kolkata');
            $today = date("Y-m-d"); 
            $query="SELECT * FROM booking WHERE Date_of_allot='$today'";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_assoc($result)){
                    $roll=$row['Std_id'];
                    $query1="SELECT * FROM student WHERE Std_id='$roll'";
                    $result1=mysqli_query($conn,$query1);
                    $row1=mysqli_fetch_assoc($result1);
                    $sname=$row1['Fname']." ".$row1['Lname'];
                    if($row['Vaccinated']=='1'){
                        $status="YES";
                    }
                    else{
                        $status="NO";
                    }
                    echo nl2br("<tr><td>{$roll}</td><td>{$sname}</td><td>{$status}</td></tr>\n");
                }
            }
            
        ?>
    </tbody>    
    </table>
</div>
</body>
</html>