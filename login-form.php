<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WANTUNAN NI POMPOM</title>
  <style>
    *, *::before, *::after {
      box-sizing: border-box;
    }
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
    .login-container {
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
    .login-container h1 {
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
    button:active {
      transform: scale(0.98);
    }
    .forgot-password {
        margin-top: 12px;
    }
    .forgot-password a {
        font-size: 13px;
        color: #ff8c00;
        text-decoration: none;
        transition: color 0.3s;
    }
    .forgot-password a:hover {
        color: #e67a00;
        text-decoration: underline;
    }
    .error-message {
      color: red;
      text-align: center;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>
  <div class="login-container">
    <img src="WAN.png" alt="Shop Logo" class="logo" />
    <h1>WANTUNAN NI POMPOM</h1>

    <?php
    session_start();
    if (isset($_SESSION['error']) && !empty($_SESSION['error'])) {
        echo '<p style="color:red; text-align:center; margin-bottom:15px;">' . $_SESSION['error'] . '</p>';
        unset($_SESSION['error']);
    }
    ?>

    <form action="login.php" method="POST">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required />
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required />
        </div>
        <button type="submit">LOGIN</button>
        <div class="forgot-password">
            <a href="forgot-password.html">Forgot Password?</a>
        </div>
    </form>
</div>

    </form>
  </div>
</body>
</html>
