<?php
include('dbconnection.php');

if(isset($_POST['two']))
{
    $employeeIdFromUser = $_POST['employeeNumber'];
    $passwordFromUser = $_POST['password'];
    $adminoremployee = $_POST['two'];

    if($adminoremployee=="admin")
    {
        $sql1 = "select employeeID,password from admin where employeeID='$employeeIdFromUser'";
        $res1 = $con->query($sql1);
        
        $row1 = $res1->fetch_row();
        if($row1=="")
        {
                $message = "Wrong Credentials..Please Enter your employee id and password....";
                $con->close();

                echo "<script>
                alert('{$message}');
                setTimeout(function() {
                    window.location.href = 'adminlogin.php';
                },);
                </script>";
        }else{
            if($employeeIdFromUser==$row1[0] && $passwordFromUser==$row1[1])
            {
                $message = "Authetication Successfull...";
                $con->close();
                
                echo "<script>
                alert('{$message}');
                </script>";
            }else{
                $message = "Incorrect Employee ID or password!";
                $con->close();
                
                echo "<script>
                alert('{$message}');
                setTimeout(function() {
                    window.location.href = 'adminlogin.php';
                },);
                </script>";
            }

        }
    }
}
date_default_timezone_set('Asia/Kolkata');
$currenttime = date("h:i:s");
$currentdate = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Font Awesome -->
    <link rel="stylesheet"  href="css/all.min.css" />
    <link rel="stylesheet"  href="css/fontawesome_min.css" />
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
</head>
<body>
<?php 
    include('dbconnection.php');
    $sql2 = "select name from admin where employeeID='$employeeIdFromUser'";
    $res2 = $con->query($sql2);
    
    $row2 = $res2->fetch_row();
    $name = $row2[0];
?>
<nav class="">
<div class="container-fluid" style="background-color:black;float:left;padding:10px">
    <a class="navbar-brand" href="#" style=""><img src="images/logo.png" width="250" height="50" alt="logo"></a>
    <span class="nameandlogout" style="color:white"><?php echo "Hi, ".$name;?>&nbsp<a href="adminlogin.php" style="color:white"><i class="fa fa-sign-out" aria-hidden="true"></i></a></span>
  </div><br>
</nav>
<br><br>
<center>
<?php
    $sql2 = "select * from attendance where employeeID = '$employeeIdFromUser' order by date desc limit 1";
    $res2 = $con->query($sql2);

    if($res2->num_rows > 0)
    {

    $row2 = $res2->fetch_row();
    
    if($row2[1]==$currentdate && $row2[5]=="marked")
    {
?>
    <div class="attendance" style="margin-top:20px;width:60%">
    <h5 style="color:white;font-family:sans-serif;margin-top:20px"><?php echo $employeeIdFromUser." | ".$name?></h5>
    <div class="card-content">
        <h4 style="background-color:white;width:50%;border-radius:25px;font-family:sans-serif;margin-top:20px;margin-bottom:50px;padding:10px;font-size:20px">Attendance Already Marked</h4>
    </div>
    </div>
<?php   
    }
    }  
    else
    {
?>
    <div class="attendance" style="margin-top:20px;width:60%">
    <h5 style="color:white;font-family:sans-serif;margin-top:20px"><?php echo $employeeIdFromUser." | ".$name?></h5>
    <div class="card-content">
        <button onclick="showAttendanceCard()" style="background-color:white;width:50%;border-radius:25px;font-family:sans-serif;margin-top:20px;margin-bottom:50px;padding:10px;font-size:20px">Mark your Attendance</button>
    </div>

    <form method="post" action="markAttendance.php">
      <input type="submit" name="attendance" value="Submit Attendance - <?php echo $currenttime;?>" style="display:none" id="attendancebutton">
      <input type="hidden" name="date" value="<?php echo $currentdate;?>">
      <input type="hidden" name="time" value="<?php echo $currenttime;?>">
      <input type="hidden" name="employeeid" value="<?php echo $employeeIdFromUser;?>">
      <input type="hidden" name="name" value="<?php echo $name;?>">
      <input type="hidden" name="status" value="marked">
    </form>
    </div>
<?php
    }
?>



<!-- ----------- -->
<div class="attendance" style="margin-top:20px;width:60%">
    <div class="card-content">
        <form action="payroll.php" method="post">
            <button style="background-color:white;width:50%;border-radius:25px;font-family:sans-serif;margin-top:20px;margin-bottom:50px;padding:10px;font-size:20px">Payroll</button>
            <input type="hidden" name="empid" value="<?php echo $employeeIdFromUser;?>">
        </form>
    </div>
</div>
</center>

<script>
    function showAttendanceCard() {
        document.getElementById('attendancebutton').style.display = 'block';
    }
  </script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>