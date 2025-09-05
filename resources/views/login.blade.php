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

 .toggle-eye {
  position: absolute;
  top: 70%;
  right: 12px;
  transform: translateY(-50%);
  cursor: pointer;
  font-size: 18px;
  line-height: 1;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100%;
  pointer-events: auto;
}

  </style>
</head>
<body>
  <div class="login-container">
    <img src="{{ asset('images/logo.png') }}" alt="Shop Logo" class="logo" />
    <h1>WANTUNAN NI POMPOM</h1>

    @if(session('error'))
      <p class="error-message">{{ session('error') }}</p>
    @endif

    <form method="POST" action="{{ route('login.submit') }}">
      @csrf
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" placeholder="Enter username" required />
      </div>
      <div class="input-group" style="position: relative;">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter password" required />
        <span class="toggle-eye" onclick="togglePassword()">👁️</span>
      </div>
      <button type="submit">LOGIN</button>
      <div class="forgot-password">
        <a href="{{ route('password.forgot') }}">Forgot Password?</a>
      </div>
    </form>
  </div>

  <script>
    function togglePassword() {
      const passwordInput = document.getElementById("password");
      const eyeIcon = document.querySelector(".toggle-eye");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        eyeIcon.textContent = "🙈";
      } else {
        passwordInput.type = "password";
        eyeIcon.textContent = "👁️";
      }
    }
  </script>
</body>
</html>