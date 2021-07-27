<?php
    require 'includes/config.inc.php';
    require_once 'includes/auth_check.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>SVD</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>


<body>
<div class="loginbox">
<h1>Student Vaccination Drive</h1>
    <div class=" w3l-login-form">
        <h2>Mark Student as Vaccinated</h2>
        <br>
        <div class="topnav">
        <a class="profile" href="vacc_admin.php">Home</a>
        <a class="profile" href="vacc_profile.php">My Profile</a>
        <a class="profile" href="includes/logout.inc.php">Logout</a>
        </div>
        <br>
        <form action="includes/vacc_mark.php" method="POST">

            <label>Student Roll No:</label>
                <div class="group">
                    <input type="text" class="form-control" name="student_roll_no" placeholder="Roll No" required="required" />
                </div>
            <button type="submit" name="mark-submit">Mark Student </button>
        </form>
    </div>
</div>
    

</body>

</html>

<?php
    
?>