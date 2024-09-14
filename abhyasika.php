<?php

// Establish a connection to the database
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=1503");

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve input data
    $AbhyasikaName = $_POST['AbhyasikaName'];
    $OwnerName = $_POST['OwnerName'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $password = $_POST['password'];

    

    // Insert data into database
    $sql = "INSERT INTO Abhyasika_Registration (AbhyasikaName, OwnerName, email, phone, address, password) VALUES ('$AbhyasikaName', '$OwnerName', '$email', '$phone', '$address', '$password')";
    if (pg_query($conn, $sql)) {
        // Registration successful, redirect to a success page or login page
        header("Location: AbhyasikaDetailform.html");
        exit();
    } else {
        // Registration failed, display error message
        echo "Error: " . pg_last_error($conn);
    }

    // Close database connection
    pg_close($conn);
}
?>
