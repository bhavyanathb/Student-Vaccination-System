<?php
    if(isset($_POST['submit'])){
        require 'config.inc.php';
        require_once 'auth_check.php'
        $roll = $_SESSION['roll'];
        $date=$_SESSION['date'];
        $password = $_POST['pwd'];
        $vacc_id = $_POST['Vaccine'];
        $query1 = "SELECT * FROM booking WHERE Std_id = '$roll'";
        $result1 = mysqli_query($conn,$query1);
        if(mysqli_num_rows($result1)==0){
            $query2 = "SELECT * FROM stddoses WHERE Std_id = '$roll'";
            $result2 = mysqli_query($conn,$query2);
            if(mysqli_num_rows($result2)==0){
                $query3 = "SELECT * FROM Student WHERE Std_id = '$roll'";
                $result3 = mysqli_query($conn,$query3);
                if($row3 = mysqli_fetch_assoc($result3)){
                    $pwdCheck = password_verify($password, $row3['Pwd']);
                    if($pwdCheck == false){
                        echo '<script type="text/javascript">'; 
                        echo 'alert("Incorrect password!!");'; 
                        echo 'window.location.href = "../schedule1.php";';
                        echo '</script>';
                    }
                    else if($pwdCheck == true) {
                        $query4="SELECT * FROM dates WHERE Date='$date' and Vacc_id='$vacc_id'";
                        $result4=mysqli_query($conn,$query4);
                        if(mysqli_num_rows($result4)==0){
                            echo '<script type="text/javascript">'; 
                            echo 'alert("Available doses havent been updated");'; 
                            echo 'window.location.href = "../home.php";';
                            echo '</script>';
                        }
                        $row4=mysqli_fetch_assoc($result4);
                        $date_id=$row4['Date_id'];
                        $avail=$row4['Avail_doses'];
                        if($avail==0){
                            echo '<script type="text/javascript">'; 
                            echo 'alert("No available doses");'; 
                            echo 'window.location.href = "../home.php";';
                            echo '</script>';
                        }
                        else{
                            $query5="UPDATE dates SET Avail_doses=Avail_doses-1 WHERE Date_id='$date_id'";
                            $result5=mysqli_query($conn,$query5);
                            $query6="INSERT INTO stddoses(Std_id,Date_id,Vacc_id) VALUES ('$roll','$date_id','$vacc_id')";
                            $result6=mysqli_query($conn,$query6);
                            date_default_timezone_set('Asia/Kolkata');
                            $today = date("Y-m-d");  
                            $query7="INSERT INTO booking Values('$roll','$today','$date','0','0')";
                            $result7=mysqli_query($conn,$query7);
                            if($result6 and $result7){
                                echo '<script type="text/javascript">'; 
                                echo 'alert("Vaccination scheduled succesfully");';
                                echo 'window.location.href = "../home.php";';
                                echo '</script>';
                            }
                        }
                     }
                }
   
            }
            else{
                echo '<script type="text/javascript">'; 
                echo 'alert("You have Already scheduled for vaccination");';
                echo 'window.location.href = "../home.php";';
                echo '</script>';
            }
        }
        else{
            $row1=mysqli_fetch_assoc($result1);
            if($row1['Vaccinated']==1){
                echo '<script type="text/javascript">'; 
                echo 'alert("You have Already Vaccinated");';
                echo 'window.location.href = "../home.php";';
                echo '</script>';   
            }
            else{
                echo '<script type="text/javascript">'; 
                echo 'alert("You have Already scheduled for vaccination");';
                echo 'window.location.href = "../home.php";';
                echo '</script>';
            }  
         }
    }
?>