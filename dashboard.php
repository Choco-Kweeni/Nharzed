<?php
session_start();
if(!isset($_SESSION['user'])){
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard</title>
<style>
  body{ font-family:Arial,sans-serif; display:flex; justify-content:center; align-items:center; height:100vh; background:#f0f4f8;}
  .card{ background:#fff; padding:40px; border-radius:15px; text-align:center; box-shadow:0 10px 20px rgba(0,0,0,0.1);}
  a{ display:inline-block; margin-top:20px; color:#007bff; text-decoration:none;}
  a:hover{ text-decoration:underline;}
</style>
</head>
<body>
  <div class="card">
    <h1>Welcome, <?= $_SESSION['user'] ?>!</h1>
    <a href="logout.php">Logout</a>
  </div>
</body>
</html>
