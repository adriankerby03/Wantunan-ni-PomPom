<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Verify PIN</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-neutral-900 text-white min-h-screen flex items-center justify-center font-sans">

  <div class="bg-neutral-800 bg-opacity-95 p-10 rounded-xl shadow-2xl w-full max-w-sm text-center">
    <img src="{{ asset('images/logo.png') }}" alt="Shop Logo" class="w-[70px] mb-2 mx-auto" />

    <h1 class="text-orange-500 text-lg font-bold mb-4">Verify PIN</h1>

    @if(session('status'))
      <p class="text-green-400 text-sm mb-3">{{ session('status') }}</p>
    @endif

    @error('pin')
      <p class="text-red-500 text-sm mb-3">{{ $message }}</p>
    @enderror

    <form action="{{ route('pin.verify') }}" method="POST" class="space-y-4 text-left">
      @csrf
      <div>
        <label for="pin" class="block text-sm text-gray-400 mb-1">Enter the 6-digit PIN sent to your email</label>
        <input
          type="text"
          id="pin"
          name="pin"
          maxlength="6"
          placeholder="Ex. 123456"
          required
          class="w-full px-4 py-3 rounded-lg bg-neutral-900 border border-gray-700 text-white text-sm focus:outline-none focus:border-orange-500 focus:ring-2 focus:ring-orange-500 transition duration-300"
        />
      </div>

      <button
        type="submit"
        class="w-full py-3 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-md text-base hover:from-orange-600 hover:to-orange-700 hover:shadow-lg transform hover:scale-105 transition duration-300"
      >
        Verify PIN
      </button>
    </form>

    <a href="{{ route('password.request') }}" class="block mt-4 text-sm text-orange-500 hover:underline hover:text-orange-400 transition duration-200">
      Back to Forgot Password
    </a>
  </div>

</body>
</html>
