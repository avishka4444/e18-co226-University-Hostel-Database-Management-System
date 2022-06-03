<?php

$servername = "localhost:3307";
$database = "pera_hostel_database";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_errno());
}
