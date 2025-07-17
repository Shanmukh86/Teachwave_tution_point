
<?php
include('conn.php');
session_start();

if (isset($_SESSION['username'])) {
    // echo "Hello : " . $_SESSION['username'];
    $username = $_SESSION['username'];

    $sql = "SELECT * FROM registeredstudents WHERE student_username = '$username';";
    $res = mysqli_query($conn, $sql);

    if ($res->num_rows > 0) {
        // echo "<ul>"; // Optional: To display in list format 
        while ($row = $res->fetch_assoc()) {
            // Print a single column, for example, 'Course_Name'
            // echo "<li>" . $row['course_name'] . "</li>";

            // Check if the course is C_Language and provide a link
            if ($row['course_name'] == 'C_Language') {
                echo '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                </head>
                
                </html>';
            }
            else if($row['course_name']=='DBMS'){
                echo '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                </head>
               
                </html>';
            }
            else if($row['course_name']=='DSA in C'){
                echo '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                </head>
               
                </html>';
            }
            else if($row['course_name']=='Data Science'){
                echo '
                <!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Document</title>
                </head>
                
                </html>';
            }
        }
        echo "</ul>";
    } else {
        echo "No records found for the user.";
    }
} else {
    echo "No username found in session.";
}
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuition Fee Waiver</title>
    <link rel="stylesheet" href="courses.css">
</head>
<style>
    /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Open Sans', sans-serif; /* Using Open Sans font */
}

html {
    font-size: 16px;
    -webkit-font-smoothing: antialiased;
}

body {
    margin: 0;
    padding: 0;
    background: #2c3e50; /* Dark slate background */
    color: #ecf0f1; /* Default light gray text for contrast */
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    font-size: 1rem;
}

/* Header Section */
header {
    width: 100%;
    background: linear-gradient(135deg, #2980b9, #16a085); /* Gradient from blue to teal */
    text-align: center;
    padding: 50px 20px;
    box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.3); /* Soft shadow */
}

header .header-container {
    display: inline-block;
    text-align: center;
}

header h1 {
    font-size: 3rem;
    font-weight: 700; /* Bold header */
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 4px;
}

header h2 {
    font-size: 1.5rem;
    font-weight: 400; /* Normal weight for subtitle */
    color: #ffffff; /* Light color to contrast with background */
    margin-top: 10px;
    letter-spacing: 1px;
}

/* Main Content Section */
main {
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
    flex: 1;
    padding: 20px;
}

.student-dashboard {
    width: 100%;
    max-width: 1200px;
    padding: 30px;
    background-color: rgba(44, 62, 80, 0.85); /* Dark semi-transparent background */
    border-radius: 10px;
    box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.3); /* Soft shadow */
    backdrop-filter: blur(10px);
}

.greeting {
    font-size: 1.5rem;
    font-weight: 600;
    color: #1abc9c; /* Teal greeting color */
    text-align: center;
    margin-bottom: 30px;
}

.course-table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 40px;
    text-align: left;
}

.course-table td {
    padding: 15px;
    border: 1px solid #34495e; /* Dark border */
}

.course-table a {
    text-decoration: none;
    color: #1abc9c; /* Teal links */
    font-size: 1.1rem;
    font-weight: 500;
    padding: 5px 10px;
    border: 2px solid #1abc9c; /* Teal border */
    border-radius: 6px;
    transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.course-table a:hover {
    background-color: #1abc9c; /* Teal background on hover */
    color: #ffffff;
    transform: translateY(-4px); /* Slight lift effect */
}

/* No records message */
.no-records, .no-session {
    font-size: 1.2rem;
    color: #ecf0f1;
    text-align: center;
    margin-top: 20px;
}

/* Footer Section */
footer {
    width: 100%;
    text-align: center;
    padding: 20px 0;
    background-color: #34495e; /* Footer background */
    color: #ecf0f1; /* Text color */
    box-shadow: 0px -6px 15px rgba(0, 0, 0, 0.1); /* Soft footer shadow */
    position: fixed;
    bottom: 0;
    left: 0;
}

/* Hover Effects */
footer:hover {
    background-color: #2980b9; /* Blue color on hover */
}

/* Responsive Design */
@media (max-width: 768px) {
    .course-table {
        font-size: 0.9rem;
    }

    .course-table a {
        font-size: 1rem;
    }

    .student-dashboard {
        padding: 20px;
    }

    .greeting {
        font-size: 1.2rem;
    }
}

@media (max-width: 480px) {
    header h1 {
        font-size: 2.5rem;
    }

    header h2 {
        font-size: 1.2rem;
    }

    .student-dashboard {
        padding: 15px;
    }

    .course-table td {
        padding: 10px;
    }

    .greeting {
        font-size: 1rem;
    }
}

</style>
<body>
    <header>
        <div class="header-container">
            <h1>TEACHWAVE -</h1>
            <h2>TUITION POINT</h2>
        </div>
    </header> 

    <main>
        <div class="student-dashboard">
            <?php
            include('conn.php');
            if (isset($_SESSION['username'])) {
                echo "<div class='greeting'>Hello, " . $_SESSION['username'] . "!</div>";
                $username = $_SESSION['username'];

                $sql = "SELECT * FROM registeredstudents WHERE student_username = '$username';";
                $res = mysqli_query($conn, $sql);

                if ($res->num_rows > 0) {
                    echo "<table class='course-table'>";
                    while ($row = $res->fetch_assoc()) {
                        echo "<tr><td>" . $row['course_name'] . "</td>";

                        // Provide course link depending on course name
                        if ($row['course_name'] == 'C_Language') {
                            echo "<td><a href='C_language.html'>Go to C Language Course</a></td>";
                        } elseif ($row['course_name'] == 'DBMS') {
                            echo "<td><a href='dbms.html'>Go to DBMS Course</a></td>";
                        } elseif ($row['course_name'] == 'DSA in C') {
                            echo "<td><a href='DSA_in_C.html'>Go to DSA in C Course</a></td>";
                        } elseif ($row['course_name'] == 'Data Science') {
                            echo "<td><a href='Data_Science.html'>Go to Data Science Course</a></td>";
                        }

                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<div class='no-records'>No records found for the user.</div>";
                }
            } else {
                echo "<div class='no-session'>No username found in session.</div>";
            }
            ?>
        </div>
    </main>

    <footer>
        <p>&copy; 2024 Teachwave - All rights reserved</p>
    </footer>
</body>
</html>
