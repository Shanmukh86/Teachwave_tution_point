<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition Fee Waiver</title>
    <link rel="stylesheet" href="x.css">
    <style>
        /* Add some simple CSS for styling */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color:  rgb(226, 31, 35);;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 36px;
        }

        header h2 {
            margin: 0;
            font-size: 24px;
        }

        .students-container {
            padding: 20px;
            margin: 20px auto;
            max-width: 800px;
            background-color: white;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .student-card {
            border: 1px solid #ddd;
            padding: 15px;
            margin-bottom: 20px;
            border-radius: 8px;
            background-color: #f9f9f9;
        }

        .student-card h3 {
            margin-top: 0;
            color: #333;
        }

        .student-info {
            margin: 10px 0;
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
        $sql = "SELECT * FROM courses";
        $res = mysqli_query($conn, $sql);

        if ($res) {
            // Check if there are any results
            if (mysqli_num_rows($res) > 0) {
                // Loop through the result set
                while ($row = mysqli_fetch_assoc($res)) {
                    echo '<div class="student-card">';
                    echo '<h3>' . htmlspecialchars($row['Course_id']) . '</h3>';
                    echo '<div class="student-info"><span>Course_Name:</span> ' . htmlspecialchars($row['Course_Name']) . '</div>';
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
