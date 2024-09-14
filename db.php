<?php

// Establish a connection to the database
$conn = pg_connect("host=localhost port=5432 dbname=postgres user=postgres password=1503");

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . pg_last_error());
}

?>
