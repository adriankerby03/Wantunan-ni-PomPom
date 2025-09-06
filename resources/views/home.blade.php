<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wantunan ni PomPom</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Vue CDN -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body class="bg-gradient-to-br from-neutral-900 to-neutral-800 min-h-screen flex items-center justify-center font-sans">

  <div id="app" class="flex flex-col items-center justify-center text-center bg-neutral-900 p-10 rounded-2xl shadow-lg w-[1000px] h-[600px] hover:scale-[1.001] transition-transform duration-200">
    <img src="images/logo.png" alt="POS Logo" class="w-[300px] rounded-lg hover:scale-105 transition-transform duration-300 mb-6" />

   <h1 class="text-orange-500 text-3xl font-bold mb-2">@{{ title }}</h1>
    <p class="text-gray-300 font-semibold mb-6">@{{ subtitle }}</p>

    <a :href="loginUrl" class="inline-block bg-orange-500 text-white px-6 py-3 rounded-lg text-lg font-semibold hover:bg-orange-600 hover:scale-105 transition-all duration-300">
      Login to Continue
    </a>

    <p class="text-xs text-gray-400 mt-6">@{{ notice }}</p>
  </div>

  <script>
    const { createApp } = Vue;

    createApp({
      data() {
        return {
          title: 'WANTUNAN NI POMPOM',
          subtitle: 'Point of Sale and Inventory System',
          loginUrl: '/login', // You can replace this with your actual route
          notice: 'Authorized staff only. Unauthorized access is prohibited.'
        };
      }
    }).mount('#app');
  </script>
</body>
</html>