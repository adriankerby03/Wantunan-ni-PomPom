<?php
session_start();
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_pin = trim($_POST['pin']);

    if (!isset($_SESSION['reset_pin']) || !isset($_SESSION['reset_user_id'])) {
        $_SESSION['error'] = "Session expired. Please request a new reset PIN.";
        header("Location: forgot-password.php");
        exit;
    }

    if ($entered_pin == $_SESSION['reset_pin']) {
        $_SESSION['pin_verified'] = true;
        header("Location: reset-password.php");
        exit;
    } else {
        $_SESSION['error'] = "Invalid PIN. Please try again.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Verify PIN - WANTUNAN ni POMPOM</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #121212;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      color: #fff;
    }
    .container {
      background: #1e1e1e;
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0px 6px 20px rgba(0,0,0,0.4);
      width: 100%;
      max-width: 350px;
      text-align: center;
    }
    .logo {
      width: 80px;
      margin-bottom: 5px;
    }
    h1 {
      margin: 5px 0 25px;
      color: #ff8c00;
      font-size: 20px;
      font-weight: bold;
    }
    .input-group {
      margin-bottom: 18px;
      text-align: left;
    }
    .input-group label {
      display: block;
      margin-bottom: 6px;
      font-size: 14px;
      color: #aaaaaa;
    }
    .input-group input {
      width: 100%;
      padding: 12px;
      border: none;
      border-radius: 6px;
      font-size: 15px;
      background: #2b2b2b;
      color: #fff;
      outline: none;
      box-sizing: border-box;
      transition: all 0.3s;
    }
    .input-group input:focus {
      border: 1px solid #ff8c00;
      box-shadow: 0 0 6px rgba(255, 140, 0, 0.6);
    }
    button {
      width: 100%;
      padding: 14px;
      background: linear-gradient(to right, #ff8c00, #e67a00);
      color: #fff;
      border: none;
      border-radius: 6px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
      transition: transform 0.1s, box-shadow 0.3s;
    }
    button:hover {
      box-shadow: 0 4px 12px rgba(255, 140, 0, 0.5);
      transform: scale(1.05);
    }
    .error-message {
      color: red;
      margin-bottom: 15px;
      font-size: 14px;
    }
    .back-link {
      margin-top: 12px;
    }
    .back-link a {
      font-size: 13px;
      color: #ff8c00;
      text-decoration: none;
      transition: color 0.3s;
    }
    .back-link a:hover {
      color: #e67a00;
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="container">
    <img src="images/WNP.png" alt="Shop Logo" class="logo" />
    <h1>Verify PIN</h1>

    <?php
    if (isset($_SESSION['error'])) {
        echo '<p class="error-message">'.$_SESSION['error'].'</p>';
        unset($_SESSION['error']);
    }
    ?>

    <form action="verify-pin.php" method="POST">
      <div class="input-group">
        <label for="pin">Enter the 6-digit PIN sent to your email</label>
        <input type="text" id="pin" name="pin" placeholder="Ex. 123456" maxlength="6" required />
      </div>
      <button type="submit">Verify PIN</button>
    </form>

    <div class="back-link">
      <a href="forgot-password.html">Back to Forgot Password</a>
    </div>
  </div>
</body>
</html>
