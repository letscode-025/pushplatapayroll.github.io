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
<nav class="" >
<div class="container-fluid" style="background-color:black;float:left;padding:10px">
    <a class="navbar-brand" href="#" style=""><img src="images/logo.png" width="250" height="50" alt="logo"></a>
  </div><br>
</nav>

<div class="signup-container" style="margin-top:80px">
<form action="signupcontroller.php" method="post" autocomplete="off" enctype="multipart/form-data" >
<h2 style="text-align:center">Sign Up</h2>
<label for="name">Name:</label>
<input type="text" id="name" name="name" required>

<label for="age">Age:</label>
<input type="number" id="age" name="age" required>

<label for="employeeId">Employee ID:</label>
<input type="text" id="employeeId" name="employeeId" required>

<label for="password">Choose Password:</label>
<input type="password" id="password" name="password" required>

<label for="address">Address:</label>
<textarea id="address" name="address" rows="4" style="width:100%" required></textarea>

<label for="gender">Gender:</label>
<select id="gender" name="gender" style="width:100%" required>
    <option value="male">Male</option>
    <option value="female">Female</option>
    <option value="other">Other</option>
</select>

<label for="dateOfJoining">Date of Joining:</label>
<input type="date" id="dateOfJoining" name="dateOfJoining" required>

<label for="mobileNumber">Mobile Number:</label>
<input type="tel" id="mobileNumber" name="mobileNumber" pattern="[0-9]{10}" required>
<small>Enter a 10-digit mobile number.</small>
<br>
<label for="">Are you an Admin?</label><br>
<label>
    <input type="radio" name="designation" value="YES">&nbsp&nbspYES
</label>
&nbsp&nbsp
&nbsp&nbsp
<label>
    <input type="radio" name="designation" value="NO" checked>&nbsp&nbspNO
</label><br>
<button type="submit" value="submit" style="margin: auto;display:flex">Submit</button>

</form>
</div>


</body>
</html>