<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

// Retrieve user data from MongoDB based on user ID
$userId = $_SESSION['user_id'];
$collection = $mongoDb->users;
$user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($userId)]);

// Check if user data exists
if ($user) {
  // Return user data as JSON
  echo json_encode($user);
} else {
  // Return error message
  echo json_encode(['error' => 'User data not found']);
}
?>
<?php
session_start();
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
  header('Location: login.php');
  exit;
}

// Retrieve user data from MongoDB based on user ID
$userId = $_SESSION['user_id'];
$collection = $mongoDb->users;
$user = $collection->findOne(['_id' => new MongoDB\BSON\ObjectID($userId)]);

// Check if user data exists
if ($user) {
  // Return user data as JSON
  echo json_encode($user);
} else {
  // Return error message
  echo json_encode(['error' => 'User data not found']);
}
?>
