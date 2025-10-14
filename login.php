<?php
session_start();
$conn = new mysqli('localhost','root','','user_db');
if($conn->connect_error) die("Connection failed: ".$conn->connect_error);

$email = $_POST['email'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT id,name,password FROM users WHERE email=?");
$stmt->bind_param("s",$email);
$stmt->execute();
$stmt->store_result();

if($stmt->num_rows == 1){
    $stmt->bind_result($id,$name,$hash);
    $stmt->fetch();
    if(password_verify($password,$hash)){
        $_SESSION['user'] = $name;
        header("Location: dashboard.php");
        exit;
    } else {
        $_SESSION['message'] = "Incorrect password.";
    }
} else {
    $_SESSION['message'] = "Email not found.";
}
$stmt->close();
$conn->close();
header("Location: index.php");
exit;
?>
