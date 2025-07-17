<?php
include('conn.php');
session_start();

// Check if form is submitted and fields are not empty
if (isset($_POST['id']) && isset($_POST['coursename']) && !empty($_POST['id']) && !empty($_POST['coursename'])) {
    
    $id_new = $_POST['id'];
    $course_new = $_POST['coursename'];
    $cost=0;
    
    $sql = "INSERT INTO courses (Course_id, Course_Name,Course_Cost) VALUES ('$id_new','$course_new',$cost)";
    $res = mysqli_query($conn, $sql);
    if($res){
       echo'<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition Fee Waiver</title>
    <link rel="stylesheet" href="add_course.css">
</head>
<body>
  <header>
    <div class="header-container">
        <h1>TEACHWAVE -</h1>
        <h2>TUITION POINT</h2>
        <link rel="stylesheet" href="add_course.css">
    </div>
</header> 
    <main>

        <div class="full">
          <div class="login-container">
            <h2> COURSE  ADDED SUCCESSFULLY!!</h2>
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
