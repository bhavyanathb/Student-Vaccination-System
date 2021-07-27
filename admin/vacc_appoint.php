<?php
    require '../includes/config.inc.php';
    require_once '../includes/auth_check.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>SVD</title>
    <link href="../css/style.css" rel="stylesheet" type="text/css" />

</head>


<body>
<div class="appointbox">
<h2>SIGN UP PAGE</h2>
    <div class=" w3l-login-form">
        <form action="../includes/va_signup.inc.php" method="POST">
            <label>Username</label>
            <div class="group">
                <input type="text" class="form-control" name="va_uname" placeholder="Username" required="required" />
            </div>
            <label>First Name</label>
            <div class="group">
                <input type="text" class="form-control" name="va_fname" placeholder="First Name" required="required" />
            </div>
            <label>Last Name</label>
            <div class="group">
                <input type="text" class="form-control" name="va_lname" placeholder="Last Name" required="required" />
            </div>
            <label>Mobile No</label>
            <div class="group">
                <input type="text" class="form-control" name="va_mobile_no" placeholder="Mobile No" required="required" />
            </div>
            <label>Email</label>
            <div class="group">
                <input type="text" class="form-control" name="va_email" placeholder="Email ID" required="required" />
            </div>
            <label>Choose Vaccine:</label>
            <div class="group">
                <input type="radio" name="va_vacc"
                <?php if (isset($vaccine) && $vaccine=="Covaxin") echo "checked";?>
                value="1">Covaxin
                <input type="radio" name="va_vacc"
                <?php if (isset($vaccine) && $vaccine=="Covisheild") echo "checked";?>
                value="2">Covishield
                <input type="radio" name="va_vacc"
                <?php if (isset($vaccine) && $vaccine=="SputnikV") echo "checked";?>
                value="3">SputnikV    
            </div>
            <label>Password:</label>
            <div class="group">
                <input type="password" class="form-control" name="pwd" placeholder="Password" required="required" />
            </div>
            <label>Confirm Password:</label>
            <div class="group">
                <input type="password" class="form-control" name="confirmpwd" placeholder="Confirm Password" required="required" />
            </div>
            <br>
            <button type="submit" name="va_signup-submit">Sign Up</button>
        </form>
    </div>
</div>

</body>

</html>
