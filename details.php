<?php

// Establish a connection to the database
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=1503");

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}


// Check if form fields are set and not empty
if (!empty($_POST['AbhyasikaName']) && !empty($_POST['AbhyasikaOwnerName']) && !empty($_POST['AbhyasikaOwnerID']) && !empty($_POST['PhoneNumber']) && !empty($_POST['EstablishedDate']) && !empty($_POST['Address']) && !empty($_POST['NumberOfSeats'])) {

    // Fetch values from the form
    $AbhyasikaName = $_POST['AbhyasikaName'];
    $AbhyasikaOwnerName = $_POST['AbhyasikaOwnerName'];
    $AbhyasikaOwnerID = $_POST['AbhyasikaOwnerID'];
    $PhoneNumber = $_POST['PhoneNumber'];
    $EstablishedDate = $_POST['EstablishedDate'];
    $Address = $_POST['Address'];
    $NumberOfSeats = $_POST['NumberOfSeats'];


    
    // Additional Facility
    $AdditionalFacility = isset($_POST['AdditionalFacility']) ? $_POST['AdditionalFacility'] : '';

    // SQL query to insert data into the Abhyasika_Details table
    $sql = "INSERT INTO Abhyasika_Details (Abhyasika_Name, Abhyasika_Owner_Name, Abhyasika_Owner_ID, Phone_Number, Established_Date, Address, Number_of_Seats, Additional_Facility) 
            VALUES ('$AbhyasikaName', '$AbhyasikaOwnerName', '$AbhyasikaOwnerID', '$PhoneNumber', '$EstablishedDate', '$Address', '$NumberOfSeats', '$AdditionalFacility')";

    // Execute the SQL query
    if (pg_query($conn, $sql)) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . pg_last_error($conn);
    }

    // Close the database connection
    pg_close($conn);
} else {
    echo "Error: Missing form fields.";
}
header("Location: AbhyasikaHome.html");
?>