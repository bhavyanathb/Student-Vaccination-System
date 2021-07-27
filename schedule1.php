<?php
    require 'includes/config.inc.php';
    require_once 'includes/auth_check.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>SVD</title>
<link rel="stylesheet" type="text/css" href="css/style.css"> 
</head>
<body>
<!-- Content will go here -->
<div class="schedulebox">
<h1>Student Vaccination Drive</h1>
<div class="topnav">
    <a class="profile" href="home.php">Home</a>
    <a class="profile" href="profile.php">My Profile</a>
    <a class="profile" href="includes/logout.inc.php">Logout</a>
    </div>
    <br>
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
        <label>Date Chosen:</label>
        <div class="group">
            <input type="date" class="form-control" name="date" placeholder="date for vaccination" value="<?php echo $_SESSION['date']?>" required="" disabled="disabled" />
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