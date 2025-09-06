<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Forgot Password</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-neutral-900 text-white min-h-screen flex items-center justify-center font-sans m-0">

  <div class="bg-neutral-800 bg-opacity-95 p-10 rounded-xl shadow-2xl w-full max-w-sm text-center">
    <img src="images/logo.png" alt="Shop Logo" class="w-[70px] mb-2 mx-auto" />

    <h1 class="text-orange-500 text-lg font-bold mb-4">WANTUNAN ni POMPOM</h1>
    <h2 class="text-white text-base mb-6">Forgot Password</h2>

    <form action="send-pin.php" method="POST" class="space-y-4 text-left">
      <div>
        <label for="email" class="block text-sm text-gray-400 mb-1">Enter your recovery email</label>
        <input
          type="email"
          id="email"
          name="email"
          placeholder="juandelacruz@gmail.com"
          required
          class="w-full px-4 py-3 rounded-lg bg-neutral-900 border border-gray-700 text-white text-sm focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500 transition duration-300"
        />
      </div>

      <button
        type="submit"
        class="w-full py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-md text-base hover:from-orange-600 hover:to-orange-700 hover:shadow-lg transform hover:scale-105 transition duration-300"
      >
        CONFIRM
      </button>
    </form>

    <a href="login-form.php" class="block mt-4 text-sm text-orange-500 hover:underline hover:text-orange-400 transition duration-200">
      Back to Login
    </a>
  </div>

</body>
</html>