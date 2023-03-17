<?php  
require 'vendor/autoload.php';  
// Creating Connection  
$con = new MongoDB\Client("mongodb://localhost:27017");  
// Creating Database  
$db = $con->profiler;  
// Creating Document  
$collection = $db->user;  
$aname = "renjith";
// Insering Record  
$collection->insertOne( [ 'name' =>'asd', 'email' =>'asd@123.com' , 'password' => 'asd'] );  
// Fetching Record  
$record = $collection->find( [ 'name' =>'Peter'] );  
foreach ($record as $user) {  
echo $user['name'], ': ', $user['email']."<br>";  
}  
?>  