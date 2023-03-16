<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profiler";

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// retrieve the form data
$name = $_POST['name'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // hash the password

// insert the data into the database
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if (mysqli_query($conn, $sql)) {
  echo "Registration successful!";
} else {
  echo "Registration failed: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
