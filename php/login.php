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
$aemail = $_POST['email'];
$apassword = $_POST['password'];
// Create record
$sql = "SELECT * FROM users WHERE email='$aemail' AND password='$apassword'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result) > 0){
	$row = mysqli_fetch_assoc($result);
	$name = $row["name"]; 
	$user_id =  $row['id'];
		echo json_encode(array('userid'=>$user_id));
	}
	else {
		echo "No user Found";
	}
$conn->close();
?>

