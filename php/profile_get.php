<?php
require '../vendor/autoload.php';
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: X-Requested-With");
session_start();

$last_id = $_POST['last_id'];
// Connect to MongoDB
try {
    $mongoClient = new MongoDB\Client("mongodb://localhost:27017"); 
} catch (MongoDB\Driver\Exception\ConnectionTimeoutException $e) {
    echo json_encode(['error' => 'Connection error: ' . $e->getMessage()]);
    exit();
}
// Select a database
$database = $mongoClient->profiler;
// Select a collection
$collection = $database->user;

// Find the record
try {
    $record = $collection->findOne(['userID' => (int)$last_id]);
} catch (MongoDB\Driver\Exception\Exception $e) {
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
    exit();
}
// print_r($record);
// Check if record was found
if ($record==NULL) {
    echo json_encode(['error' => 'No data found']);
    exit();
}

// Return record data as JSON
if($record['phone']!=NULL && $record['address']!=NULL){
echo json_encode(
array(   
     'name' => $record['name'],
    'email' => $record['email'] ,
    'phone' => $record['phone'] ,
    'address' =>  $record['address'])
);
}else{
    echo json_encode(
        array(   
             'name' => $record['name'],
            'email' => $record['email'] ,
        ));
}
?>