<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition Fee Waiver</title>
    <link rel="stylesheet" href="x.css">
    <style>
      /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

html {
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
}

/* Body Background and General Styling */
body {
    background: #2c3e50; /* Purple to Pink Gradient */
    margin: 0;
    padding: 0;
    font-family: Arial, sans-serif;
    color: #fff; /* White text to contrast against the gradient */
}

/* Header Section */
header {
    background: linear-gradient(135deg, #9b59b6, #e74c3c); /* Abstract purple to pink gradient */
    color: white;
    padding: 40px 20px;
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

/* Form Container */
.full {
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 40px 0;
}

.login-container {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    padding: 30px;
    width: 100%;
    max-width: 400px;
    text-align: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Added transition for hover effect */
}

.login-container:hover {
    transform: translateY(-5px); /* Slight lift effect */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Deeper shadow on hover */
}

.login-container h2 {
    color: #333;
    margin-bottom: 20px;
}

form label {
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    color: #333;
}

form input {
    width: 100%;
    padding: 12px;
    margin-bottom: 20px;
    border-radius: 8px;
    border: 1px solid #ddd;
    font-size: 16px;
    background-color: #f9f9f9;
    box-sizing: border-box;
    transition: border-color 0.3s ease, background-color 0.3s ease; /* Added transition */
}

form input:focus {
    outline: none;
    border-color: #e74c3c; /* Match the header color */
    background-color: #fff;
}

form button {
    width: 100%;
    padding: 12px;
    background-color: #e74c3c; /* Use the same theme color */
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease; /* Added transition */
}

form button:hover {
    background-color: #c0392b; /* Darker shade for hover */
    transform: scale(1.05); /* Slight scale-up effect on hover */
}

/* Students Container */
.students-container {
    padding: 40px;
    max-width: 1200px;
    margin: 0 auto;
}

.student-card {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.3s ease, box-shadow 0.3s ease; /* Added transition */
}

.student-card:hover {
    transform: translateY(-5px); /* Slight lift effect */
    box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2); /* Deeper shadow on hover */
}

.student-card h3 {
    font-size: 20px;
    margin-bottom: 15px;
    color: #333;
}

.student-info {
    font-size: 16px;
    margin-bottom: 8px;
    color: #555;
}

.student-info span {
    font-weight: bold;
}

.no-students {
    text-align: center;
    font-size: 18px;
    color: #888;
}

.error {
    text-align: center;
    color: red;
    font-size: 18px;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .login-container {
        padding: 20px;
    }

    .students-container {
        padding: 20px;
    }
}

@media (max-width: 480px) {
    .login-container {
        padding: 15px;
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
        // session_start();
        include('conn.php');
        

        // Query to select all students
        $sql = "SELECT * FROM students";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            // Check if there are any results
            if (mysqli_num_rows($res) > 0) {
                // Loop through the result set
                while ($row = mysqli_fetch_assoc($res)) {
                    echo '<div class="student-card">';
                    echo '<h3>' . htmlspecialchars($row['Name']) . '</h3>';
                    echo '<div class="student-info"><span>Contact:</span> ' . htmlspecialchars($row['Contact']) . '</div>';
                    echo '<div class="student-info"><span>Email:</span> ' . htmlspecialchars($row['Email']) . '</div>';
                    echo '<div class="student-info"><span>Username:</span> ' . htmlspecialchars($row['Username']) . '</div>';
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
