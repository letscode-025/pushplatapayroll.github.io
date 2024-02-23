
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

    <style>
        table {
            border-collapse: collapse;
            width: 50%;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: lightblue;
        }

        button {
            border: none;
            text-decoration:underline;
            color:blue;
        }
    </style>
    
</head>
<body>
<?php 
    include('dbconnection.php');
    $adminname = $_POST['admin_name'];
    // $sql1 = "select * from admin where employeeID='$employeeIdFromUser'";
    // $res1 = $con->query($sql1);
    
    // $row1 = $res1->fetch_row();
    // echo $row1['name'];
    // die();
    // $name = $row1[0];
?>
<nav class="">
<div class="container-fluid" style="background-color:black;float:left;padding:10px">
    <a class="navbar-brand" href="#" style=""><img src="images/logo.png" width="250" height="50" alt="logo"></a>
    <span class="nameandlogout" style="color:white"><?php echo "Hi, ".$adminname;?>&nbsp<a href="adminlogin.php" style="color:white"><i class="fa fa-sign-out" aria-hidden="true"></i></a></span>
  </div><br>
</nav>
<br><br>
<center>
        <?php
            $employeeID = $_POST['employee_id'];
            $allowedEntryTime = "10:00:00";
            $actual = 1000;
            $deducted = 800;
            $totalSalary = 0;
            $sql1 = "select * from attendance where employeeID = '$employeeID'";
            $res1 = $con->query($sql1);
    
            if ($res1->num_rows > 0) {
            // Fetch and display each row
            echo "<table border='1'>";
            echo "<tr><th>Date</th><th>Time</th><th>Employee ID</th><th>Name</th><th>Earnings</th></tr>";
            while ($row1 = $res1->fetch_assoc()) {
                // $row1 is an associative array representing each row
            echo "<tr>";
            echo "<td>" . $row1["date"] . "</td>";
            echo "<td>" . $row1["time"] . "</td>";
            echo "<td>" . $row1["employeeID"] . "</td>";
            echo "<td>" . $row1["name"] . "</td>";
       
            if ($row1["time"]>$allowedEntryTime) {
                echo "<td>{$deducted}</td>";
                $totalSalary += $deducted;
            } else {
                echo "<td>{$actual}</td>";
                $totalSalary += $actual;
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
        ?>
<br><br><br><br>
    <?php

        // include('dompdf/autoload.inc.php');
        // use Dompdf\Dompdf;
        // $obj = new Dompdf();
        // $data = "<h1>Hello</h1>";
        // $obj->loadHTML($data);
        // $obj->render();
        // $obj->stream('Sample.pdf',array('Attachment'=>0));

        if ($res1->num_rows > 0) {

       $sql2 = "select * from employee where employeeID = '$employeeID'";
       $res2 = $con->query($sql2);

       if ($res2->num_rows > 0) {
        // Fetch and display each row
        echo "<table border='1'>";
        echo "<tr><th>Name</th><th>Employee ID</th><th>Age</th><th>Date of Joining</th><th>Particulars</th><th>Salary</th></tr>";
        while ($row2 = $res2->fetch_assoc()) {
            // $row1 is an associative array representing each row
        echo "<tr>";
        echo "<td>" . $row2["name"] . "</td>";
        echo "<td>" . $row2["employeeID"] . "</td>";
        echo "<td>" . $row2["age"] . "</td>";
        echo "<td>" . $row2["dateofjoining"] . "</td>";
        echo "<td>" . "Total Income" . "</td>";
        echo "<td>" . "Rs."."$totalSalary"."/-" . "</td>";
        echo "</tr>";
    }
    echo "</table>";
        }
        }
    ?>
</center>
</body>
</html>
