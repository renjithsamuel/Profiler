<?php
require '../vendor/autoload.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "profiler";


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");


session_start();


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



$last_id = 0;
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


// Connect to MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017"); 
// Select a database
$database = $mongoClient->profiler;
// Select a collection
$collection = $database->user;
// Create a new document
$document = array(
  
    'userID' => $last_id,
    'name' => $aname,
    'email' => $aemail,
    'password' => $apassword,
    'phone' =>  NULL,
    'address' => NULL,
    // 'data' => array(
    //     'name' => 'John Doe',
    //     'age' => 30,
    //     'location' => 'New York'
    // )
);

// Insert the document into the collection
$collection->insertOne($document);
// Close the connection
// $mongoClient->close();

// $record = $collection->find();  
// foreach ($record as $employe) {  
// echo $employe['name'], ': ', $employe['email'];  
// }  


// require 'vendor/autoload.php';  
// // Creating Connection  
// $con = new MongoDB\Client("mongodb://localhost:27017");  
// // Creating Database  
// $db = $con->profiler;  
// // Creating Document  
// $collection = $db->user;  
// $aname = "renjith";
// // Insering Record  
// $collection->insertOne( [ 'name' =>'$aname', 'email' =>'peter@abc.com' ] );  
// // Fetching Record  
// $record = $collection->find( [ 'name' =>'Peter'] );  
// foreach ($record as $employe) {  
// echo $employe['name'], ': ', $employe['email']."<br>";  
// }  

?>

