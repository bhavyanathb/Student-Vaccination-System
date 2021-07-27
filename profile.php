
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SVD</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="statusbox">
<h1>My Profile</h1>
<div class="topnav">
    <a class="profile" href="home.php">Home</a>
    <a class="profile" href="profile.php">My Profile</a>
    <a class="profile" href="includes/logout.inc.php">Logout</a>
    </div>
    <br>
<?php
    require 'includes/config.inc.php';
    require_once 'includes/auth_check.php';
    $roll=$_SESSION['roll'];
    $query1="SELECT * FROM booking WHERE Std_id='$roll'";
    $result1=mysqli_query($conn,$query1);
    if(mysqli_num_rows($result1)==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("You havent scheduled for vaccination");'; 
        echo 'window.location.href = "home.php";';
        echo '</script>';
    }
    else{
        $row1=mysqli_fetch_assoc($result1);
        $vaccinated=$row1['Vaccinated'];
        $dob=$row1['Date_of_book'];
        $doa=$row1['Date_of_allot'];
        if($vaccinated==1){
            echo '<script type="text/javascript">'; 
            echo 'alert("You have vaccinated");'; 
            echo 'window.location.href = "home.php";';
            echo '</script>';
            exit();
        }
        $query3="SELECT * FROM stddoses WHERE Std_id='$roll'";
        $result3=mysqli_query($conn,$query3);
        $row3=mysqli_fetch_assoc($result3);
        $vacc_id=$row3['Vacc_id'];
        $query4="SELECT * FROM vaccines WHERE Vacc_id='$vacc_id'";
        $result4=mysqli_query($conn,$query4);
        $row4=mysqli_fetch_assoc($result4);
        $vacc_name=$row4['Vacc_name'];
        date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d"); 
        $diff=round((strtotime($doa)-strtotime($today))/86400);
        if($diff>0){
            if($diff>1){
                echo "Hello, you have scheduled your vaccination on $doa for $vacc_name, You have to wait $diff days";
                $query2="UPDATE booking SET Status='you have scheduled your vaccination on $doa, You have to wait $diff days'";
                $result2=mysqli_query($conn,$query2);

            }
            else{
                echo "you have scheduled your vaccination on $doa for $vacc_name, You have to wait $diff day";
                $query2="UPDATE booking SET Status='you have scheduled your vaccination on $doa, You have to wait $diff day'";
                $result2=mysqli_query($conn,$query2);
            }
        }
        else if($diff==0){
            echo '<script type="text/javascript">'; 
            echo 'alert("Your vaccination scheduled for today");'; 
            echo 'window.location.href = "home.php";';
            echo '</script>';
        }
        else{
            $vaccinated=$row1['Vaccinated'];
            if($vaccinated==1){
                echo "You have vaccinated on $doa";
            }
            else{
                $roll=$_SESSION['roll'];
                $query1="SELECT * FROM stddoses WHERE Std_id='$roll'";
                $result1=mysqli_query($conn,$query1);
                $row1=mysqli_fetch_assoc($result1);
                $date_id=$row1['Date_id'];
                $vacc_id=$row1['Vacc_id'];
                $query2="SELECT * FROM booking WHERE Std_id='$roll'";
                $result2=mysqli_query($conn,$query2);
                $row2=mysqli_fetch_assoc($result2);
                $doa=$row2['Date_of_allot'];
                $query3="SELECT * FROM vaccines WHERE Vacc_id='$vacc_id'";
                $result3=mysqli_query($conn,$query3);
                $row3=mysqli_fetch_assoc($result3);
                $vacc_name=$row3['Vacc_name'];
                $query4="DELETE FROM booking WHERE Std_id='$roll'";
                $result4=mysqli_query($conn,$query4);
                $query5="DELETE FROM stddoses WHERE Std_id='$roll'";
                $result5=mysqli_query($conn,$query5);
                $query6="UPDATE dates SET Avail_doses=Avail_doses+1 WHERE Date_id='$date_id'";
                $result6=mysqli_query($conn,$query6);
                echo '<script type="text/javascript">'; 
                echo 'alert("Your are out of date, Please reschedule your vaccination");'; 
                echo 'window.location.href = "home.php";';
                echo '</script>';
            }
        }
    }
?>
</div>
</body>
</html>