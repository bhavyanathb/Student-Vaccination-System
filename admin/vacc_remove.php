<?php
    require '../includes/config.inc.php';
    require_once '../includes/auth_check.php';
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>SVD</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css"/>

</head>


<body>
<div class="loginbox">
<h1>Remove Administrator</h1>
<br>
<div class="topnav">
<a class="profile" href="admin_home.php">Home</a>
<a class="profile" href="../includes/logout.inc.php">Logout</a>
</div>
<br>
<form action="../includes/vacc_rem.php" method="POST">
<label>Username:</label>
<div class="group">
    <input type="text" class="form-control" name="va_uname" placeholder="Username" required="required" />
</div>
<label>Password:</label>
<div class="group">
    <input type="password" class="form-control" name="pwd" placeholder="password" required="required" />
</div>
<button type="submit" name="rem-submit">Remove </button>
</form>
</div>
    

</body>

</html>

<?php
    
?>