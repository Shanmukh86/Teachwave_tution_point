<?php
session_start();
include('conn.php');

$username = $_POST['username_admin'];
$password = $_POST['password_admin']; 

// SQL query to check credentials
$sql = "SELECT * FROM admin WHERE admin_username='$username' AND admin_password='$password'";
$res = mysqli_query($conn, $sql);

if ($result = mysqli_fetch_assoc($res)) {
    // Display Admin Dashboard on successful login
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Dashboard</title>
        <style>
     /* General Reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Lato", sans-serif, "Merriweather", serif; /* New fonts */
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
    justify-content: center; /* Center vertically */
    align-items: center; /* Center horizontally */
    min-height: 100vh; /* Ensure it takes up full height */
    font-size: 1rem;
    width: 100%;
}

/* Header Section */
header {
    width: 100%;
    background: linear-gradient(135deg, #9b59b6, #e74c3c); /* Purple to vibrant red gradient */
    text-align: center;
    padding: 30px 20px;
    box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.3); /* Soft shadow */
}

header .header-container {
    display: inline-block;
    text-align: center;
}

header h1 {
    font-size: 3rem;
    font-weight: 700;
    color: #ffffff;
    text-transform: uppercase;
    letter-spacing: 4px;
    margin: 0;
}

header h2 {
    font-size: 1.5rem;
    font-weight: 400;
    color: #ffffff;
    margin-top: 10px;
    letter-spacing: 1px;
}

/* Main Content Section */
.dashboard-container {
    width: 100%;
    display: flex;
    justify-content: center; /* Center the content horizontally */
    align-items: center; /* Center the content vertically */
    flex: 1;
    min-height: 100vh; /* Ensure it takes up full height */
    padding: 0 20px; /* Add some padding for better spacing */
}

.main-content {
    width: 100%;
    max-width: 1200px;
    padding: 30px;
    background-color: rgba(44, 62, 80, 0.85); /* Dark semi-transparent background */
    border-radius: 10px;
    box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.3); /* Soft shadow */
    backdrop-filter: blur(10px);
    display: flex;
    flex-direction: column;
    align-items: center; /* Center align all child elements */
}

/* Content Section */
.content-section {
    text-align: center;
    margin-bottom: 40px;
}

.content-section h2 {
    font-size: 2.5rem;
    font-weight: 600;
    color: #e74c3c; /* Vibrant red accent */
}

.content-section p {
    font-size: 1.2rem;
    color: #ecf0f1;
    margin-top: 10px;
}

/* Cards Container */
.cards-container {
    display: flex;
    justify-content: center; /* Center cards horizontally */
    flex-wrap: wrap;
    gap: 20px; /* Adjust gap between cards */
    margin-bottom: 40px;
    width: 100%;
    padding: 0 20px;
}

.card {
    width: 100%;
    max-width: 280px;
    background: #34495e; /* Dark card background */
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2); /* Soft shadow */
    text-align: center;
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.card h3 {
    font-size: 1.5rem;
    font-weight: 600;
    color: #ecf0f1;
    margin-bottom: 15px;
}

.card a {
    text-decoration: none;
    color: #e74c3c; /* Vibrant red links */
    font-size: 1.2rem;
    font-weight: 500;
    letter-spacing: 1px;
    display: inline-block;
    padding: 10px 15px;
    border: 2px solid #e74c3c; /* Vibrant red border */
    border-radius: 6px;
    transition: background-color 0.3s ease-in-out, transform 0.3s ease-in-out;
}

.card a:hover {
    background-color: #e74c3c; /* Vibrant red background on hover */
    color: #ffffff;
    transform: translateY(-4px); /* Slight lift effect */
}

.card:hover {
    transform: translateY(-4px); /* Lift effect */
    box-shadow: 0px 10px 25px rgba(0, 0, 0, 0.3); /* Shadow effect */
}

/* Large Card for Admin Summary */
.large-card {
    background: #34495e;
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0px 10px 40px rgba(0, 0, 0, 0.3); /* Soft shadow */
    margin-top: 40px;
    text-align: center;
}

.large-card h2 {
    font-size: 2rem;
    font-weight: 600;
    color: #ecf0f1;
    margin-bottom: 20px;
}

.large-card p {
    font-size: 1.2rem;
    color: #ecf0f1;
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
    background-color: #9b59b6; /* Purple on hover */
}

/* Responsive Design */
@media (max-width: 768px) {
    .cards-container {
        flex-direction: column;
        align-items: center;
    }

    .card {
        width: 90%;
        margin-bottom: 20px;
    }

    .content-section h2 {
        font-size: 2rem;
    }

    .content-section p {
        font-size: 1.1rem;
    }
}

@media (max-width: 480px) {
    header h1 {
        font-size: 2.5rem;
    }

    header h2 {
        font-size: 1.2rem;
    }

    .main-content {
        padding: 20px;
    }
}

        </style>
    </head>
    <body>
    <header>
        <div class="header-container">
            <h1>TEACHWAVE -</h1>
            <h2>ADMIN PANEL</h2>
        </div>
    </header>

    <div class="dashboard-container">
        <!-- Main Content Section -->
        <main class="main-content">
            <div class="content-section">
                <h2>Welcome, ' . $username . '!</h2>
                <p>Here you can manage admins, courses, and students. Choose an action below:</p>
            </div>

            <div class="cards-container">
                <div class="card">
                    <h3>Add an Admin</h3>
                    <a href="http://localhost/DBMSPROJWCT2/add_admin_structure.html">Add Admin</a>
                </div>

                <div class="card">
                    <h3>Add a Course</h3>
                    <a href="http://localhost/DBMSPROJWCT2/add_course_structure.html">Add Course</a>
                </div>

                <div class="card">
                    <h3>See Registered Students</h3>
                    <a href="http://localhost/DBMSPROJWCT2/see_registered_students.php">See registered Students</a>
                </div>
            </div>

            <div class="cards-container">
                <div class="card">
                    <h3>Remove a Course</h3>
                    <a href="http://localhost/DBMSPROJWCT2/delete_course_structure.html">Remove Course</a>
                </div>

                <div class="card">
                    <h3>See Students</h3>
                    <a href="http://localhost/DBMSPROJWCT2/see_student.php">See Students</a>
                </div>
            </div>

            <div class="large-card">
                <h2>Admin Panel Summary</h2>
                <p>Manage and track the progress of admins, students, and courses effortlessly!</p>
            </div>
        </main>
    </div>

    <footer>
        <p>&copy; 2024 TeachWave. All rights reserved.</p>
    </footer>
    </body>
    </html>
    ';
} else {
    echo 'Incorrect credentials!';
}
?>
