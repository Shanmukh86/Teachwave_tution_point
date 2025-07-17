<?php

include('conn.php');
session_start();

$username=$_POST['username'];
$name=$_POST['name'];
$contact=$_POST['number'];
$email=$_POST['mail'];
$pasword=$_POST['password'];
$conf_pass=$_POST['confirm_password'];

$sql1="SELECT * FROM `students` WHERE `Username`='$username'";
$res1=mysqli_query($conn,$sql1);
$rows=mysqli_num_rows($res1);
if($rows>0){
echo "Username already exists";
header('Location: signup_student.html');
}
else{
    
    
if($pasword==$conf_pass){
    $sql="INSERT INTO `students` (`Name`, `Contact`, `Email`, `Username`, `Password`) VALUES ('$name', '$contact', '$email', '$username', '$pasword'); ";
    $res=mysqli_query($conn,$sql);
    
    if($res){
    echo "row inserted successfully";
    }
    else{
        echo "error";
    }    
}
else{
 echo '
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition Fee Waiver</title>
    <link rel="stylesheet" href="login_student_style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4; /* Light background for contrast */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            background-color: #e74c3c; /* Header color */
            width: 100%;
            padding: 20px 0;
            color: white;
            text-align: center;
        }

        nav {
            margin: 20px 0;
        }

        .nav-links {
            list-style-type: none;
            padding: 0;
        }

        .nav-links li {
            display: inline;
            margin: 0 15px;
        }

        .nav-links a {
            text-decoration: none;
            color: #e74c3c; /* Link color matching the header */
            font-weight: bold;
        }

        .nav-links a:hover {
            text-decoration: underline; /* Underline effect on hover */
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .error-message {
            background-color: #e74c3c; /* Error message color */
            color: white; /* Improved text contrast */
            padding: 20px;
            border-radius: 5px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Shadow for depth */
            margin: 20px;
            max-width: 400px; /* Max width for better layout */
        }

        .error-message h2 {
            margin: 0 0 10px; /* Spacing below the heading */
        }

        .error-message p {
            margin: 0 0 15px; /* Spacing below the paragraph */
        }

        .error-message a {
            color: white; /* Link color matching the text */
            text-decoration: underline; /* Underline effect for the link */
        }

        .error-message a:hover {
            text-decoration: none; /* Remove underline on hover */
        }
    </style>
</head>
<body>
  <header>
    <div class="header-container">
        <h1>TEACHWAVE -</h1>
        <h2>TUITION POINT</h2>
    </div>
  </header> 
  <nav>
    <ul class="nav-links">
        <li><a href="#">Home</a></li>
        <li><a href="aboutus.html">About Us</a></li>    
        <li><a href="#">Login</a></li>
        <li><a href="loginpage_admin.html">Login as admin</a></li>
    </ul>
  </nav>

  <main>
    <div class="error-message">
        <h2>PASSWORD MISMATCH</h2>
        <p>Please ensure that your passwords match and try again.</p>
        <a href="signup_student.html">Return to Login</a>
    </div>
  </main>
</body>
</html>
';  
}
}









?>