
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
    $employeeIdFromUser = $_POST['empid'];
    $sql1 = "select name from admin where employeeID='$employeeIdFromUser'";
    $res1 = $con->query($sql1);
    
    $row1 = $res1->fetch_row();
    $name = $row1[0];
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
    $sql2 = "select * from employee";
    $res2 = $con->query($sql2);
    
    if ($res2->num_rows > 0) {
        // Fetch and display each row
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Name</th><th>Employee ID</th><th>Payroll</th></tr>";
        while ($row2 = $res2->fetch_assoc()) {
            // $row2 is an associative array representing each row

            echo "<tr>";
            echo "<td>" . $row2["id"] . "</td>";
            echo "<td>" . $row2["name"] . "</td>";
            echo "<td>" . $row2["employeeID"] . "</td>";
            echo "<td>" ; 
            echo "<form action='finalpayroll.php' method='post'>";
            echo "<button type='submit' class='submit-button'>Click Here</button>";
            echo "<input type='hidden' name='employee_id' value='$row2[employeeID]'>";
            echo "<input type='hidden' name='admin_name' value='$name'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";

            
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
?>
</center>
</body>
</html>
