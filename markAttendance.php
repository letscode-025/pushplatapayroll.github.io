<?php
include('dbconnection.php');

    $date = $_POST['date'];
    $time = $_POST['time'];
    $employeeid = $_POST['employeeid'];
    $name = $_POST['name'];
    $status = $_POST['status'];
    
    if(isset($_POST['attendance']))
    {   
        $sql1 = $con->prepare("insert into attendance(date,time,employeeID,name,status) values(?, ?, ?, ?, ?)");

        $sql1->bind_param("ssiss",$date,$time,$employeeid,$name,$status);
        $sql1->execute();

        $message = "Attendance Marked Successfully...";
        echo "
            <script>
                alert('{$message}');
                setTimeout(function() {
                    window.location.href = 'index.php';
                },);
            </script>
        ";
    }
?>