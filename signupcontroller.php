<?php
    include('dbconnection.php');

    $name = $_POST['name'];
    $age = $_POST['age'];
    $employeeId = $_POST['employeeId'];
    $password = $_POST['password'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $dateOfJoining = $_POST['dateOfJoining'];
    $mobileNumber = $_POST['mobileNumber'];
    $designation = $_POST['designation'];
    // echo $name." ".$age." ".$employeeId." ".$password." ".$address." ".$gender." ".$dateOfJoining." ".$mobileNumber." ".$designation;
    
    

    if(isset($_POST["designation"]))
    {
        if($designation =='YES')
        {
            $sql1 = "insert into admin(name,age,employeeID,address,gender,dateofjoining,mobilenumber,adminornot,password) values('$name','$age','$employeeId','$address','$gender','$dateOfJoining','$mobileNumber','$designation','$password')";

            if($con->query($sql1) === TRUE)
            {
                $message = "Registration Successfull....";
                $con->close();


                echo "<script>
                alert('{$message}');
                setTimeout(function() {
                    window.location.href = 'index.php';
                },);
                </script>";
            }
        }else{
            $sql2 = "insert into employee(name,age,employeeID,address,gender,dateofjoining,mobilenumber,adminornot,password) values('$name','$age','$employeeId','$address','$gender','$dateOfJoining','$mobileNumber','$designation','$password')";

            if($con->query($sql2) === TRUE)
            {
                $message = "Registration Successfull....";
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



?>