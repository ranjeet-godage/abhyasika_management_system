<?php
// Include database connection
include 'db.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch values from the form
    $fullname = $_POST['firstName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $studentId = $_POST['studentId'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    // SQL query to insert data into the Student_Registration table
    $sql = "INSERT INTO Student_Registration (fullname, email, phoneNumber, studentId, password, address) 
            VALUES ('$fullname', '$email', '$phoneNumber', '$studentId', '$password', '$address')";

    // Execute the SQL query
    $result = pg_query($conn, $sql);

    header("Location: search.html");

    // Check if the query was successful
    if ($result) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: Unable to insert data.";
    }

    // Close the database connection
    pg_close($conn);
}
?>

