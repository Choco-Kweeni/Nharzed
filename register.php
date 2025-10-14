<?php
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Database connection
$conn = new mysqli('localhost', 'root', '', 'user_db'); // change credentials if needed
if ($conn->connect_error) {
    $_SESSION['message'] = "Database connection failed: " . $conn->connect_error;
    header("Location: index.php");
    exit;
}

// Get POST data safely
$name = trim($_POST['name']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Basic validation
if(empty($name) || empty($email) || empty($password)){
    $_SESSION['message'] = "All fields are required.";
    header("Location: index.php");
    exit;
}

// Check if email already exists
$stmt = $conn->prepare("SELECT id FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows > 0){
    $_SESSION['message'] = "Email is already registered.";
    $stmt->close();
    $conn->close();
    header("Location: index.php");
    exit;
}
$stmt->close();

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insert new user
$stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $email, $hashed_password);

if($stmt->execute()){
    $_SESSION['message'] = "Registration successful. You can now login.";
} else {
    $_SESSION['message'] = "Registration failed: " . $stmt->error;
}

$stmt->close();
$conn->close();

// Redirect back to index.php
header("Location: index.php");
exit;
?>
