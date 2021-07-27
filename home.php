<?php
    require 'includes/config.inc.php';
    require_once 'includes/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">
<title>SVD</title>
<head>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
<div class="loginbox">
<h1>Student Vaccination Drive</h1>
    <div class="topnav">
    <a class="profile" href="home.php">Home</a>
    <a class="profile" href="profile.php">My Profile</a>
    <a class="profile" href="includes/logout.inc.php">Logout</a>
    </div>
    <br>
    <form action="hom2.php" method="POST">
        <label>Choose Date:</label>
        <div class="group">
            <input type="date" class="form-control" name="date" placeholder="date for vaccination" required="required" />
        </div>
    <button type="submit" name="submit1">check availability</button><br>
    <br>
    <button type="submit" name="submit2">schedule vaccination</button>
    </form>
    <p class="register">Want to<a href="reschedule.php" class="profile"> Reschedule</a></p>
</div>

 
</body>
</html>
