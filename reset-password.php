<?php
session_start();
require 'db.php';

if (!isset($_SESSION['pin_verified']) || $_SESSION['pin_verified'] !== true) {
    $_SESSION['error'] = "Unauthorized access. Please verify your PIN again.";
    header("Location: forgot-password.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($new_password) || empty($confirm_password)) {
        $_SESSION['error'] = "Please fill in both fields.";
    } elseif ($new_password !== $confirm_password) {
        $_SESSION['error'] = "Passwords do not match.";
    } else {
        $user_id = $_SESSION['reset_user_id'];

        $stmt = $conn->prepare("UPDATE tbl_employee SET password_hash = ? WHERE id = ?");
        $stmt->bind_param("si", $new_password, $user_id);

        if ($stmt->execute()) {
            unset($_SESSION['reset_pin'], $_SESSION['pin_verified'], $_SESSION['reset_user_id']);

            $_SESSION['success'] = "Password updated successfully. Please log in.";
            header("Location: login-form.php");
            exit;
        } else {
            $_SESSION['error'] = "Error updating password. Try again.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reset Password - WANTUNAN ni POMPOM</title>
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
  </style>
</head>
<body>
  <div class="container">
    <img src="images/WNP.png" alt="Shop Logo" class="logo" />
    <h1>Reset Password</h1>

    <?php
    if (isset($_SESSION['error'])) {
        echo '<p class="error-message">'.$_SESSION['error'].'</p>';
        unset($_SESSION['error']);
    }
    ?>

    <form action="reset-password.php" method="POST">
      <div class="input-group">
        <label for="new_password">New Password</label>
        <input type="password" id="new_password" name="new_password" placeholder="Enter new password" required />
      </div>
      <div class="input-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required />
      </div>
      <button type="submit">Confirm Reset</button>
    </form>
  </div>
</body>
</html>
