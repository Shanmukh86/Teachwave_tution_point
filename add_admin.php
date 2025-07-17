<?php
include('conn.php');
session_start();

// Check if form is submitted and fields are not empty
if (isset($_POST['username']) && isset($_POST['password']) && !empty($_POST['username']) && !empty($_POST['password'])) {
    
    $username_new = $_POST['username'];
    $password_new = $_POST['password'];
    
    $sql = "INSERT INTO admin (admin_username, admin_password) VALUES ('$username_new','$password_new')";
    $res = mysqli_query($conn, $sql);
    if($res){
       echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition Fee Waiver</title>
    <link rel="stylesheet" href="x.css">
</head>
<body>
  <header>
    <div class="header-container">
        <h1>TEACHWAVE -</h1>
        <h2>TUITION POINT</h2>
    </div>
</header> 
    <main>

        <div class="full">
          <div class="login-container">
            <h2> ADMIN  ADDED SUCCESSFULLY!!</h2>
        </div>
        </div>
    </main>
</body>
</html>
';
    }
    else {
        // Error preparing statement
        echo "Error: Could not prepare the SQL statement.";
    }

} else {
    echo "Error: All fields are required.";
}

// Close the database connection
mysqli_close($conn);
?>
