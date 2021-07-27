<?php
    require 'includes/config.inc.php';
    require_once 'includes/auth_check.php';
    $roll=$_SESSION['roll'];
    $query1="SELECT * FROM stddoses WHERE Std_id='$roll'";
    $result1=mysqli_query($conn,$query1);
    if(mysqli_num_rows($result1)==0){
        echo '<script type="text/javascript">'; 
        echo 'alert("You havent scheduled for vaccination");'; 
        echo 'window.location.href = "home.php";';
        echo '</script>';
    }
    else{
        $row1=mysqli_fetch_assoc($result1);
        $date_id=$row1['Date_id'];
        $vacc_id=$row1['Vacc_id'];
        $query2="SELECT * FROM booking WHERE Std_id='$roll'";
        $result2=mysqli_query($conn,$query2);
        $row2=mysqli_fetch_assoc($result2);
        if($row2['Vaccinated']=='1'){
            echo '<script type="text/javascript">'; 
            echo 'alert("You have Vaccinated");'; 
            echo 'window.location.href = "home.php";';
            echo '</script>';
        }
        $dob=$row2['Date_of_book'];
        $doa=$row2['Date_of_allot'];
        $query3="SELECT * FROM vaccines WHERE Vacc_id='$vacc_id'";
        $result3=mysqli_query($conn,$query3);
        $row3=mysqli_fetch_assoc($result3);
        $vacc_name=$row3['Vacc_name'];
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SVD</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" >
</head>
<body>
<div class="reschedulebox">
<h1>Student Vaccination Drive</h1>
    <h2>Reschedule Booking</h2>
    <div class="topnav">
    <a class="profile" href="home.php">Home</a>
    <a class="profile" href="profile.php">My Profile</a>
    <a class="profile" href="includes/logout.inc.php">Logout</a>
    </div>
    <br>
    <form action="reschedule1.php" method="POST">
        <label>Date scheduled:</label>
        <div class="group">
            <input type="date" class="form-control" name="" placeholder="date for vaccination" value="<?php echo $doa?>" required="required" disabled="disabled" />
         </div>
        <br>
        <label>Choose New Date:</label>
        <div class="group">
            <input type="date" class="form-control" name="date" placeholder="date for vaccination" required="required" />
        </div>
        <br>
        <label>Are you sure for Rescheduling:</label>
        <div class="group">
            <input type="radio" name="opinion" value="1">Yes
            <input type="radio" name="opinion" value="2">No
        </div>
        <br>
        <button type='submit' name='submit'>submit</button>
    </form>
</div>
</body>
</html>