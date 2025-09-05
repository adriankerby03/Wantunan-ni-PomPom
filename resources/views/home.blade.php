<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Wantunan ni PomPom</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: linear-gradient(135deg, #0d0d0d, #1e1e1e);
      margin: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;

    }


    .container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;

    text-align: center;
    background: #1e1e1e;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    width: 1000px;
    height: 600px;
    margin: auto;
  }


    h1 {
      margin-bottom: 10px;
      color: #ff8c00;
      font-weight: bold;
    }

    p {
    color: #bbb;
      margin: 5px 0 20px;
      font-weight: bold;
    }


    .btn {
      display: inline-block;
      background: #ff8c00;
      color: #fff;
      padding: 12px 25px;
      border-radius: 8px;
      text-decoration: none;
      font-size: 16px;
      transition: background 0.3s ease;
    }

    .btn:hover {
      background: #e67a00;
        transform: scale(1.05);
    }

    .notice {
      margin-top: 20px;
      font-size: 11px;
      color: #aaa;
    }

    .logo {
  width: 300px;
  border-radius: 8px;
}

.logo:hover{
  transform: scale(1.05);
}

.container:hover{
  transform: scale(1.001);
}



  </style>
</head>
<body>
  <div class="container">
     <img src="images/logo.png" alt="POS Logo" class="logo">
    <h1>WANTUNAN NI POMPOM</h1>
    <p>Point of Sale and Inventory System</p>

   <a href="{{ route('login.form') }}" class="btn">Login to Continue</a>

    <a class="notice">Authorized staff only. Unauthorized access is prohibited.</a>
  </div>
</body>
<script>
