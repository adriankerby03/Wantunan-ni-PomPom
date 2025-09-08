<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>WANTUNAN NI POMPOM</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Vue CDN -->
  <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
</head>
<body class="bg-neutral-900 text-white min-h-screen flex items-center justify-center font-sans">

  <div id="app" class="bg-neutral-800 p-10 rounded-xl shadow-2xl w-full max-w-sm text-center">
    <img src="{{ asset('images/logo.png') }}" alt="Shop Logo" class="w-[80px] mb-2 mx-auto" />
    <h1 class="text-orange-500 text-lg font-bold mb-6">WANTUNAN NI POMPOM</h1>

    <p v-if="errorMessage" class="text-red-500 text-sm mb-4">@{{ errorMessage }}</p>

    <form method="POST" action="{{ route('login.submit') }}" class="space-y-5 text-left">
      @csrf
      <div>
        <label for="username" class="block text-sm text-gray-400 mb-1">Username</label>
        <input
          type="text"
          id="username"
          name="username"
          placeholder="Enter username"
          required
          class="w-full px-4 py-3 rounded-md bg-neutral-900 text-white border border-transparent focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500 transition duration-300"
        />
      </div>

      <div class="relative">
        <label for="password" class="block text-sm text-gray-400 mb-1">Password</label>
        <input
          :type="showPassword ? 'text' : 'password'"
          id="password"
          name="password"
          placeholder="Enter password"
          required
          class="w-full px-4 py-3 rounded-md bg-neutral-900 text-white border border-transparent focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500 transition duration-300"
        />
        <span
          class="absolute top-1/2 right-3 transform -translate-y-1/2 text-lg cursor-pointer"
          @click="togglePassword"
        >
          @{{ showPassword ? '🙈' : '👁️' }}
        </span>
      </div>

      <button
        type="submit"
        class="w-full py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-md text-base hover:from-orange-600 hover:to-orange-700 hover:shadow-lg transform hover:scale-105 active:scale-95 transition duration-300"
      >
        LOGIN
      </button>

      <div class="text-center mt-3">
  <a href="{{ route('password.request') }}" 
     class="text-orange-500 text-sm hover:text-orange-400 hover:underline transition duration-200">
    Forgot Password?
  </a>
</div>

    </form>
  </div>

  <script>
    const { createApp } = Vue;

    createApp({
      data() {
        return {
          showPassword: false,
          errorMessage: '{{ session('error') }}' || ''
        };
      },
      methods: {
        togglePassword() {
          this.showPassword = !this.showPassword;
        }
      }
    }).mount('#app');
  </script>
</body>
</html>