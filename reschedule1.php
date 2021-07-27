<?php
    require 'includes/config.inc.php';
    require_once 'includes/auth_check.php';
    if(isset($_POST['submit'])){
        $date=$_POST['date'];
        date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d");
        if($today>$date){
            echo '<script type="text/javascript">'; 
            echo 'alert("Please Choose a valid date");'; 
            echo 'window.location.href = "reschedule.php";';
            echo '</script>';
            exit();
        }
        $_SESSION['date']=$date;
        $opinion=$_POST['opinion'];
        if($opinion==1){
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
        }
        else{
            header('Location:home.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SVD</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" >
</head>
<body>
<div class="reschedulebox1">
<h1>Student Vaccination Drive</h1>
    <h2>Previous Booking Details</h2>
    <form action="includes/schedule2.php" method="POST">
        <label>Student Roll No:</label>
        <div class="group">
            <input type="text" class="form-control" name="student_roll_no" placeholder="Roll No" value="<?php echo $_SESSION['roll']?>" required="" disabled="disabled" />
        </div>
        <label>Student Name:</label>
        <div class="group">
            <input type="text" class="form-control" name="student_name" placeholder="Name" value="<?php echo $_SESSION['fname']." ".$_SESSION['lname']?>" required="" disabled="disabled" />
        </div>
        <label>Student Age:</label>
        <div class="group">
            <input type="text" class="form-control" name="student_age" placeholder="Age" value="<?php echo $_SESSION['age']?>" required="" disabled="disabled" />
        </div>
        <label>Choosen Vaccine:</label>
        <div class="group">
            <input type="text" class="form-control" name="" placeholder="Vaccine Name" value="<?php echo $vacc_name ?>" required="required" disabled="disabled"  />
        </div>
        <label>Choose Vaccine:</label>
        <div class="group">
            <input type="radio" name="Vaccine"
            <?php if (isset($vaccine) && $vaccine=="Covaxin") echo "checked";?>
            value="1">Covaxin
            <input type="radio" name="Vaccine"
            <?php if (isset($vaccine) && $vaccine=="Covisheild") echo "checked";?>
            value="2">Covishield
            <input type="radio" name="Vaccine"
            <?php if (isset($vaccine) && $vaccine=="SputnikV") echo "checked";?>
            value="3">SputnikV    
        </div>
        <label>Date Allocated:</label>
        <div class="group">
            <input type="date" class="form-control" name="" placeholder="date for vaccination" value="<?php echo $doa?>" required="required" disabled="disabled" />
        </div>
        <label>Choosen New Date:</label>
        <div class="group">
            <input type="date" class="form-control" name="date" placeholder="date for vaccination" value="<?php echo $date?>" required="required" disabled="disabled" />
        </div>
        <label>Password:</label>
        <div class="group">
            <input type="password" class="form-control" name="pwd" placeholder="Password"  required="required" />
        </div>
        <br>
        <button type="submit" name="submit">schedule vaccination</button>
    </form>
</div>
</body>
</html>
