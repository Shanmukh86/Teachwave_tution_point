<?php
include('conn.php');
session_start();

// Check if form is submitted and fields are not empty
if (isset($_POST['id_d'])  && !empty($_POST['id_d'])) {
    
    $id_rem = $_POST['id_d'];  
    $sql = "DELETE FROM courses WHERE Course_id='$id_rem' ";
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
            <h2> COURSE  REMOVED SUCCESSFULLY!!</h2>
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
