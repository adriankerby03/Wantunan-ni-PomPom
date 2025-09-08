<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Reset Password</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-neutral-900 text-white min-h-screen flex items-center justify-center font-sans">

  <div class="bg-neutral-800 bg-opacity-95 p-10 rounded-xl shadow-2xl w-full max-w-sm text-center">
    <img src="{{ asset('images/logo.png') }}" alt="Shop Logo" class="w-[70px] mb-2 mx-auto" />

    <h1 class="text-orange-500 text-lg font-bold mb-4">Reset Password</h1>

    @error('password')
      <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
    @enderror

    <form method="POST" action="{{ route('password.update') }}" class="space-y-4 text-left">
      @csrf
      <div>
        <label for="password" class="block text-sm text-gray-400 mb-1">New Password</label>
        <input
          type="password"
          id="password"
          name="password"
          required
          class="w-full px-4 py-3 rounded-lg bg-neutral-900 border border-gray-700 text-white text-sm focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500 transition duration-300"
        />
      </div>

      <div>
        <label for="password_confirmation" class="block text-sm text-gray-400 mb-1">Confirm Password</label>
        <input
          type="password"
          id="password_confirmation"
          name="password_confirmation"
          required
          class="w-full px-4 py-3 rounded-lg bg-neutral-900 border border-gray-700 text-white text-sm focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500 transition duration-300"
        />
      </div>

      <button
        type="submit"
        class="w-full py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-md text-base hover:from-orange-600 hover:to-orange-700 hover:shadow-lg transform hover:scale-105 transition duration-300"
      >
        Reset Password
      </button>
    </form>
    
<a href="{{ route('login.form') }}" class="block mt-4 text-sm text-orange-500 hover:underline hover:text-orange-400 transition duration-200">
    Back to Login
</a>
  </div>

</body>
</html>
