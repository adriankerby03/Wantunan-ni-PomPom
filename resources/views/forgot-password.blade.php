<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #121212;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      color: #ffffff;
    }

    .forgot-container {
      background: rgba(30, 30, 30, 0.95);
      padding: 40px 30px;
      border-radius: 12px;
      box-shadow: 0px 6px 20px rgba(0,0,0,0.3);
      width: 100%;
      max-width: 350px;
      text-align: center;
    }

    .logo {
      width: 70px;
      margin-bottom: 5px;
    }

    h1 {
      font-size: 20px;
      font-weight: bold;
      margin: 5px 0 15px;
      color: #ff8c00;
    }

    h2 {
      margin-bottom: 20px;
      font-size: 18px;
      color: #ffffff;
    }

    .input-group {
      margin-bottom: 15px;
      text-align: left;
    }

    .input-group label {
      display: block;
      font-size: 14px;
      color: #bbb;
      margin-bottom: 6px;
    }

    .input-group input {
      width: 100%;
      padding: 12px;
      border: 1px solid #444;
      border-radius: 8px;
      background: #1e1e1e;
      color: #fff;
      font-size: 15px;
      transition: border-color 0.3s, box-shadow 0.3s;
      box-sizing: border-box; /* ensures alignment */
    }

    .input-group input:focus {
      outline: none;
      border-color: #ff8c00;
      box-shadow: 0 0 4px rgba(255, 140, 0, 0.6);
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
      transition: 0.3s;
      box-sizing: border-box;
      transition: transform 0.1s, box-shadow 0.3s;
    }

    button:hover {
      box-shadow: 0 4px 12px rgba(255, 140, 0, 0.5);
      background: #e67a00;
      transform: scale(1.05);
    }

    .back-link {
      margin-top: 15px;
      display: block;
      font-size: 14px;
      color: #ff8c00;
      text-decoration: none;
    }

    .back-link:hover {
      text-decoration: underline;
      color: #e67a00;
    }
  </style>
</head>
<body>
  <div class="forgot-container">
    <img src="images/logo.png" alt="Shop Logo" class="logo">
    <h1>WANTUNAN ni POMPOM</h1>
    <h2>Forgot Password</h2>
    <form action="send-pin.php" method="POST">
      <div class="input-group">
        <label for="email">Enter your recovery email</label>
        <input type="email" id="email" name="email" placeholder="juandelacruz@gmail.com" required>
      </div>
      <button type="submit">CONFIRM</button>
    </form>
    <a href="login-form.php" class="back-link">Back to Login</a>
  </div>
</body>
</html>
