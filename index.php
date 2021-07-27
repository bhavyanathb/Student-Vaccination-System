<?php
    require 'includes/config.inc.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>SVD</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">

</head>


<body>
    <div class=" loginbox">
        <h1>Student Vaccination Drive</h1>
        <h2>Student Login</h2>
        <form action="includes/login.inc.php" method="POST">
            <label>Student Roll No:</label>
            <div class="group">
                <input type="text" class="form-control" name="student_roll_no" placeholder="Roll No" required="required" />
            </div>
            <label>Password:</label>
            <div class="group">
                <input type="password" class="form-control" name="pwd" placeholder="Password" required="required" />
            </div>
            <button type="submit" name="login-submit">Login</button>
        </form>
          <p class="register">Login as<a href="va_login.php" class="profile"> Vaccine-Administrator/Admin</a></p>
        <p class="register">Don't have an account?<a href="signup.php" class="profile"> Sign up</a></p>
    </div>
    

</body>

</html>

<?php
    
?>