<?php
// connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profiler";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// retrieve the form data
$username = $_POST['username'];
$password = $_POST['password'];

// validate the user credentials
$sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // if the user credentials are valid, store the user ID in local storage
  $row = mysqli_fetch_assoc($result);
  $userId = $row['id'];
  $response = array('status' => 'success', 'userId' => $userId);
}
else {
  // if the user credentials are invalid, return an error message
  $response = array('status' => 'error', 'message' => 'Invalid username or password');
}

mysqli_close($conn);
header('Content-Type: application/json');
echo json_encode($response);
?>
