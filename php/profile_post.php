<?php
require '../vendor/autoload.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");


session_start();
$aname = $_POST['name'];
$aemail = $_POST['email'];
$aphone = $_POST['phone'];
$aaddress = $_POST['address'];
$last_id = $_POST['last_id'];
// Connect to MongoDB
$mongoClient = new MongoDB\Client("mongodb://localhost:27017"); 
// Select a database
$database = $mongoClient->profiler;
// Select a collection
$collection = $database->user;
// Create a new document
// Insert the document into the collection
$collection->updateOne(
    ['userID' => (int)$last_id],
    ['$set' => ['name' => $aname, 'email' => $aemail, 'phone' => $aphone, 'address' => $aaddress]]
);


?>