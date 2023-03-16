<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profiler";

session_start();

header('Access-Control-Allow-Origin: *');

header('Access-Control-Allow-Methods: GET, POST');

header("Access-Control-Allow-Headers: X-Requested-With");
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$aname = $_POST['name'];
$aemail = $_POST['email'];
$apassword = $_POST['password'];

// Create record
$sql = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$sql->bind_param("sss", $aname, $aemail, $apassword);




if ($sql->execute() === TRUE) {
  $last_id = $conn->insert_id;
  echo $last_id;

  // Add the last inserted ID to the browser local storage
  // echo "$last_id";

} else {
  echo "Error inserting into table : " . $conn->error;
};

$sql->close();
$conn->close();
?>

