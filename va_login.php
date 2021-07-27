<?php
    require 'includes/config.inc.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>SVD</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>

</head>


<body>
<div class="valoginbox">
<h1>Student Vaccination Drive</h1>
<h2>Vaccine-Administrator/Admin Login</h2>
    <form action="includes/va_login.inc.php" method="POST">
        <label>Username:</label>
        <div class="group">
            <input type="text" class="form-control" name="va_uname" placeholder="Username" required="required" />
        </div>
        <label>Password:</label>
        <div class="group">
            <input type="password" class="form-control" name="pwd" placeholder="Password" required="required" />
        </div>
        <button type="submit" name="login-submit">Login</button>
    </form>
    <p>Login as<a href="index.php" class="profile"> Student</a></p>
</div>
    

</body>

</html>

<?php
    
?>