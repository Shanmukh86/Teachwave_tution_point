<?php
include('conn.php');
session_start();


// Ensure these POST values are set and not empty
$username = isset($_POST['Username']) ? $_POST['Username'] : null;
$course_selected = isset($_POST['course']) ? $_POST['course'] : null;
$value = 1001;
    
// Check if mandatory POST data is missing
if (empty($username) || empty($course_selected)) {
    die("Error: Username or course is missing!");
}

// Insert the student into the registeredstudents table
$sql = "INSERT INTO `registeredstudents` (`student_username`, `Course_id`, `Course_Name`) 
        VALUES ('$username', '$value', '$course_selected');";
$res = mysqli_query($conn, $sql);

if ($res) {
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

        
    </main>
</body>
</html>
';

    // Fetch the Course_id for the given Course_Name
    $sql1 = "SELECT `Course_id` FROM `courses` WHERE `Course_Name` = '$course_selected'";
    $res1 = mysqli_query($conn, $sql1);

    if ($res1) {
        $row = mysqli_fetch_assoc($res1);
        
        // Check if the result is not empty
        if ($row) {
            $x = $row['Course_id'];

            // Update the courses table with the fetched Course_id
            $sql2 = "UPDATE `courses` SET `Course_id` = '$x' WHERE `Course_Name` = '$course_selected'";
            $res2 = mysqli_query($conn, $sql2);

            if ($res2) {
                echo "<h2> Registered successfully. </h2>";
            } else {
                echo "Error in updating Course_id: " . mysqli_error($conn);
            }
        } else {
            echo "No Course_id found for the given Course_Name.";
        }
    } else {
        echo "Error in fetching Course_id: " . mysqli_error($conn);
    }
} else {
    echo "Error in inserting row: " . mysqli_error($conn);
}
?>
