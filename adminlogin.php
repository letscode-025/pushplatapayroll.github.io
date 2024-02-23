<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    

    <!-- Font Awesome -->
    <link rel="stylesheet"  href="css/all.min.css" />
    <link rel="stylesheet"  href="css/fontawesome_min.css" />
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
</head>
<body>
<nav class="" style="margin:0">
<div class="container-fluid" style="background-color:black;float:left;padding:10px">
    <a class="navbar-brand" href="#" style=""><img src="images/logo.png" width="250" height="50" alt="logo"></a>
  </div><br>
</nav>

<form action="admindashboard.php" method="post" autocomplete="off" enctype="multipart/form-data" style="margin-top:100px">
    <div class="login-container" >
        <h2>Admin Login</h2>

        <label for="employeeNumber">Employee Number:</label>
        <input type="text" id="employeeNumber" name="employeeNumber" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
        <input type="hidden" name="two" id="" value="admin">
    </div>
</form>
<br>

    <div class="admin-login-and-signup">
    <a href="index.php" class="employee-login">Home</a>
    &nbsp&nbsp&nbsp&nbsp <a href="signup.php" class="signup">Sign Up?</a>
    </div>

</body>
</html>