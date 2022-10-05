<?php


include 'partials/_dbcreate.php';


// Connecting to database
$server = "localhost";
$username = "root";
$password = "";
$database = "users";


$conn = mysqli_connect($server, $username, $password, $database);

if (!$conn) {
    die("Error connecting to your database!");
} else {
    // echo "You are connected to database.";
}
