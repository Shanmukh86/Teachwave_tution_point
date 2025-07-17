<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition Fee Waiver</title>
    <link rel="stylesheet" href="x.css">
    <!-- Link to Open Sans font from Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    <style>
       /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif; /* Applied Open Sans as default font */
}

html {
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
}

/* Body Styling */
body {
    background: #2c3e50; /* Abstract purple to pink gradient */
    margin: 0;
    padding: 0;
    font-family: 'Open Sans', sans-serif; /* Applied Open Sans font */
    color: #fff; /* White text to contrast against the gradient */
}

/* Header Section */
header {
    background: linear-gradient(135deg, #9b59b6, #e74c3c); /* Abstract purple to pink gradient */
    color: white;
    padding: 20px;
    text-align: center;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Added shadow to header */
}

header h1 {
    margin: 0;
    font-size: 36px;
}

header h2 {
    margin: 0;
    font-size: 24px;
}

/* Students Container */
.students-container {
    display: flex; /* Using flexbox for layout */
    flex-wrap: wrap; /* Allow the cards to wrap to the next line when needed */
    justify-content: space-evenly; /* Evenly space out the student cards */
    padding: 20px;
    margin: 20px auto;
    max-width: 1000px; /* Set a max-width for better space utilization */
    background: linear-gradient(135deg, #9b59b6, #e74c3c);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); /* Added shadow for the whole container */
    border-radius: 8px;
    color: #2c3e50;
}

/* Student Card Flexbox Layout */
.student-card {
    display: flex;
    flex-direction: column; /* Stack the student info vertically inside each card */
    justify-content: space-between;
    border: 1px solid #ddd;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 8px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Added shadow for each student card */
    width: 100%; /* Default width for small screens */
    max-width: 300px; /* Set a max-width to control card size */
    margin-right: 15px; /* Spacing between cards */
    margin-left: 15px;
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Added smooth transition */
}

/* Hover Effect for Cards */
.student-card:hover {
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15); /* Slightly larger shadow on hover */
    transform: translateY(-5px); /* Lift effect on hover */
}

/* Align Student Info */
.student-info {
    margin: 10px 0;
}

.student-info span {
    font-weight: bold;
    color: #333;
}

/* No Students Found Message */
.no-students {
    text-align: center;
    font-size: 18px;
    color: #888;
}

/* Error Message */
.error {
    text-align: center;
    color: red;
    font-size: 18px;
}

/* Responsive Design for Small Screens */
@media (max-width: 768px) {
    .students-container {
        padding: 10px;
    }

    .student-card {
        width: 100%; /* Ensure cards take full width on smaller screens */
        margin-right: 0; /* Remove right margin on small screens */
        margin-left: 0; /* Remove left margin on small screens */
    }
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

  <main>
    <div class="students-container">

        <?php
        include('conn.php');
        session_start();

        // Query to select all students
        $sql = "SELECT * FROM registeredstudents";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            // Check if there are any results
            if (mysqli_num_rows($res) > 0) {
                // Loop through the result set
                while ($row = mysqli_fetch_assoc($res)) {
                    echo '<div class="student-card">';
                    echo '<div class="student-info"><span>User name:</span> ' . htmlspecialchars($row['student_username']) . '</div>';
                    echo '<div class="student-info"><span>Course-id:</span> ' . htmlspecialchars($row['course_id']) . '</div>';
                    echo '<div class="student-info"><span>Course-Name:</span> ' . htmlspecialchars($row['course_name']) . '</div>';
                    echo '</div>';
                }
            } else {
                echo '<div class="no-students">No students found.</div>';
            }
        } else {
            echo '<div class="error">Error executing query: ' . mysqli_error($conn) . '</div>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>

    </div>
  </main>
</body>
</html>
