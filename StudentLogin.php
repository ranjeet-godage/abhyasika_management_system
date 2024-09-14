<?php

// Establish a connection to the database
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=1503");

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

session_start();

// Retrieve input data
$email = $_POST['email'];
$password = $_POST['password'];

// Query to check if the user exists
$sql = "SELECT * FROM Student_Registration WHERE email='$email' AND password='$password'";
$result = pg_query($conn, $sql);

if ($result) {
    $row = pg_fetch_assoc($result);
    if ($row && $row['email'] === $email && $row['password'] === $password) {
        // Store user data in session
        $_SESSION['id'] = $row['id'];
        $_SESSION['fullname'] = $row['fullname'];
        $_SESSION['email'] = $email;

        // Redirect to the dashboard page
        header("Location: search.html");
        exit();
    } else {
        // Invalid username or password
        echo '<script type="text/javascript">';
        echo 'alert("Invalid username or password");';
        echo 'window.location.href = "StudentHome.html";';
        echo '</script>';
        exit();
    }
} else {
    // Query execution error
    echo "Error: " . pg_last_error($con);
}

header("Location: search.html");
// Close database connection
pg_close($con);

?>
