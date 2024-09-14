<?php
session_start();

// Establish a connection to the database
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=1503");

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Query to check if the user exists
    $sql = "SELECT * FROM Abhyasika_Registration WHERE email='$email' AND password='$password'";
    $result = pg_query($conn, $sql);

    if ($result) {
        $row = pg_fetch_assoc($result);
        // Check if user exists and password matches
        if ($row) {
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
            echo '</script>';
        }
    } else {
        // Query execution error
        echo "Error: " . pg_last_error($conn);
    }
}

// Close database connection
pg_close($conn);
?>