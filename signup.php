<!DOCTYPE html>
<html lang="en">

<head>
    <title>SVD</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body>
<div class="signupbox">
<h1>Student Vaccination Drive</h1>
<h2>Sign Up Here</h2>
<form action="includes/signup.inc.php" method="POST">
    <label>Student Roll No</label>
    <div class="group">
        <input type="text" class="form-control" name="student_roll_no" placeholder="Roll No" required="required" />
    </div>
    <label>First Name</label>
    <div class="group">
        <input type="text" class="form-control" name="student_fname" placeholder="First Name" required="required" />
    </div>
    <label>Last Name</label>
    <div class="group">
        <input type="text" class="form-control" name="student_lname" placeholder="Last Name" required="required" />
    </div>
    <label>Mobile No</label>
    <div class="group">
        <input type="text" class="form-control" name="mobile_no" placeholder="Mobile No" required="required" />
    </div>
    <label>Email</label>
    <div class="group">
        <input type="text" class="form-control" name="email" placeholder="Email ID" required="required" />
    </div>
    <label>Department</label>
    <div class="group">
        <input type="text" class="form-control" name="department" placeholder="Department" required="required" />
    </div>
    <label>Year of Study</label>
    <div class="group">
        <input type="text" class="form-control" name="year_of_study" placeholder="Year of Study" required="required" />
    </div>
    <label>Age</label>
    <div class="group">
        <input type="text" class="form-control" name="age" placeholder="Age" required="required" />
    </div>
    <label>Password:</label>
    <div class="group">
        <input type="password" class="form-control" name="pwd" placeholder="Password" required="required" />
    </div>
    <label>Confirm Password:</label>
    <div class="group">
        <input type="password" class="form-control" name="confirmpwd" placeholder="Confirm Password" required="required" />
    </div>
    <button type="submit" name="signup-submit">Sign Up</button>
</form>
<p>Already a member?<a href="index.php" class="profile"> Login</a></p>
</div>
</body>
</html>
