<?php
session_start();
$message = '';
if(isset($_SESSION['message'])){
    $message = $_SESSION['message'];
    unset($_SESSION['message']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login / Register</title>
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }

  body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(135deg, #71b7e6, #9b59b6);
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    padding: 20px;
  }

  .container {
    background: #fff;
    border-radius: 15px;
    padding: 40px 30px;
    width: 400px;
    max-width: 100%;
    box-shadow: 0 15px 30px rgba(0,0,0,0.2);
    transition: all 0.3s ease;
  }

  h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
  }

  .message {
    text-align: center;
    color: red;
    font-size: 14px;
    margin-bottom: 20px;
  }

  form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    transition: opacity 0.3s ease;
  }

  input[type="text"], input[type="email"], input[type="password"] {
    padding: 12px 15px;
    border: 1px solid #ccc;
    border-radius: 10px;
    font-size: 14px;
    outline: none;
    transition: all 0.3s ease;
  }

  input:focus {
    border-color: #9b59b6;
    box-shadow: 0 0 10px rgba(155, 89, 182, 0.2);
  }

  button {
    padding: 12px;
    border: none;
    border-radius: 10px;
    background: #9b59b6;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
  }

  button:hover { background: #8e44ad; }

  .switch {
    text-align: center;
    font-size: 13px;
    color: #555;
    margin-top: 5px;
  }

  .switch a {
    color: #9b59b6;
    text-decoration: none;
    font-weight: 500;
  }

  .switch a:hover { text-decoration: underline; }
</style>
</head>
<body>

<div class="container">
    <?php if($message): ?>
      <div class="message"><?= $message ?></div>
    <?php endif; ?>

    <!-- Login Form -->
    <form id="loginForm" action="login.php" method="POST">
      <h2>Login</h2>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Sign In</button>
      <div class="switch">
        Don't have an account? <a href="#" id="showRegister">Create Account</a>
      </div>
    </form>

    <!-- Register Form -->
    <form id="registerForm" action="register.php" method="POST" style="display:none;">
      <h2>Create Account</h2>
      <input type="text" name="name" placeholder="Full Name" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
      <div class="switch">
        Already have an account? <a href="#" id="showLogin">Login</a>
      </div>
    </form>
</div>

<script>
  const loginForm = document.getElementById('loginForm');
  const registerForm = document.getElementById('registerForm');
  const showRegister = document.getElementById('showRegister');
  const showLogin = document.getElementById('showLogin');

  showRegister.addEventListener('click', (e) => {
    e.preventDefault();
    loginForm.style.display = 'none';
    registerForm.style.display = 'flex';
  });

  showLogin.addEventListener('click', (e) => {
    e.preventDefault();
    registerForm.style.display = 'none';
    loginForm.style.display = 'flex';
  });
</script>

</body>
</html>
