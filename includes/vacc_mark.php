<?php
    if(isset($_POST['mark-submit'])){
        require 'config.inc.php';
        $roll=$_POST['student_roll_no'];
        //echo $roll;
        $vacc_id=$_SESSION['vacc_id'];
        //echo $vacc_id;
        $query1="SELECT * FROM booking WHERE Std_id='$roll'";
        $result1=mysqli_query($conn,$query1);
        if(mysqli_num_rows($result1)==0){
            echo '<script type="text/javascript">'; 
            echo 'alert("Havent scheduled for vaccination");'; 
            echo 'window.location.href = "../vacc_admin.php";';
            echo '</script>';
            exit();
        }
        $query2="SELECT * FROM stddoses WHERE Std_id='$roll'";
        $result2=mysqli_query($conn,$query2);
        $row2=mysqli_fetch_assoc($result2);
        $std_vacc_id=$row2['Vacc_id'];
        $query3="SELECT * FROM vaccines WHERE Vacc_id='$std_vacc_id'";
        $result3=mysqli_query($conn,$query3);
        $row3=mysqli_fetch_assoc($result3);
        $vacc_name=$row3['Vacc_name'];
        if($std_vacc_id!=$vacc_id){
            echo '<script type="text/javascript">'; 
            echo 'alert("student scheduled for '.$vacc_name.'");'; 
            echo 'window.location.href = "../vacc_admin.php";';
            echo '</script>';
            exit();
        }
        $row1=mysqli_fetch_assoc($result1);
        $vaccinated=$row1['Vaccinated'];
        $dob=$row1['Date_of_book'];
        $doa=$row1['Date_of_allot'];
        if($vaccinated==1){
            echo '<script type="text/javascript">'; 
            echo 'alert("Student vaccinated");'; 
            echo 'window.location.href = "../vacc_admin.php";';
            echo '</script>';
            exit();
        }
        //echo $dob;
        date_default_timezone_set('Asia/Kolkata');
        $today = date("Y-m-d"); 
        if($doa!=$today){
            echo '<script type="text/javascript">'; 
            echo 'alert("Scheduled on '.$doa.'");'; 
            echo 'window.location.href = "../vacc_admin.php";';
            echo '</script>';
            exit();
        }
        $query4="UPDATE booking SET Vaccinated='1' WHERE Std_id='$roll'";
        $result4=mysqli_query($conn,$query4);
        // $query5="UPDATE student SET Status='1' WHERE Std_id='$roll'";
        // $result5=mysqli_query($conn,$query5);
        echo '<script type="text/javascript">'; 
        echo 'alert("Student marked successfully");'; 
        echo 'window.location.href = "../vacc_admin.php";';
        echo '</script>';
    }   
?>