<?php
include('dbconnection.php');

if(isset($_POST['one']))
{
    $employeeIdFromUser = $_POST['employeeNumber'];
    $passwordFromUser = $_POST['password'];
    $adminoremployee = $_POST['one'];

    if($adminoremployee=="employee")
    {
        $sql1 = "select employeeID,password from employee where employeeID='$employeeIdFromUser'";
        $res1 = $con->query($sql1);
        
        $row1 = $res1->fetch_row();
        if($row1=="")
        {
                $message = "Wrong Credentials..Please Enter your employee id and password....";
                $con->close();

                echo "<script>
                alert('{$message}');
                setTimeout(function() {
                    window.location.href = 'index.php';
                },);
                </script>";
        }else{
            if($employeeIdFromUser==$row1[0] && $passwordFromUser==$row1[1])
            {
                $message = "Authetication Successfull...";
                $con->close();
                
                echo "<script>
                alert('{$message}');
                setTimeout(function() {
                    window.location.href = 'employeedashboard.php';
                },);
                </script>";
            }else{
                $message = "Incorrect Employee ID or password!";
                $con->close();
                
                echo "<script>
                alert('{$message}');
                setTimeout(function() {
                    window.location.href = 'index.php';
                },);
                </script>";
            }
    
        }
        
    }
}else
{
    
}

?>