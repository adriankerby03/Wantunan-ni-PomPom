<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>User Management — Wantunan ni PomPom</title>

  <!-- Tailwind CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-neutral-900 to-neutral-800 min-h-screen font-sans text-white">

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-[265px] bg-gradient-to-b from-neutral-900 to-neutral-950 border-r border-neutral-800 p-5">
      <div class="flex items-center gap-3 mb-6">
        <img src="/images/logo.png" alt="Logo" class="w-10 h-10 rounded-lg object-cover" />
        <h1 class="text-orange-500 text-sm font-bold leading-tight">
          Wantunan ni PomPom<br>
          <span class="text-gray-400 font-normal">Admin Panel</span>
        </h1>
      </div>
      <nav class="flex flex-col gap-2 text-sm">
        <a href="{{ route('admin.dashboard') }}" class="px-3 py-2 rounded-lg hover:bg-neutral-800">🏠 Dashboard</a>
        <a href="/admin/pos" class="px-3 py-2 rounded-lg hover:bg-neutral-800">🧾 POS</a>
        <a href="/admin/products" class="px-3 py-2 rounded-lg hover:bg-neutral-800">📦 Products</a>
        <a href="/admin/categories" class="px-3 py-2 rounded-lg hover:bg-neutral-800">🗂️ Categories</a>
        <a href="/admin/reports" class="px-3 py-2 rounded-lg hover:bg-neutral-800">📈 Reports</a>
        <a href="/admin/suppliers" class="px-3 py-2 rounded-lg hover:bg-neutral-800">🤝 Suppliers</a>
        <a href="{{ route('users.index') }}" class="px-3 py-2 rounded-lg bg-neutral-800">👤 Users</a>
        <a href="/admin/settings" class="px-3 py-2 rounded-lg hover:bg-neutral-800">⚙️ Settings</a>
        <a href="/logout" class="px-3 py-2 rounded-lg hover:bg-neutral-800">🚪 Logout</a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 flex flex-col">
      <!-- Topbar -->
      <div class="flex items-center gap-4 px-5 py-4 border-b border-neutral-800 bg-neutral-900">
        <div class="relative flex-1">
          <span class="absolute left-3 top-1/2 transform -translate-y-1/2 opacity-70">🔎</span>
          <input type="search" placeholder="Search..." class="w-full pl-10 pr-4 py-2 rounded-lg bg-neutral-800 border border-neutral-700 text-sm text-white focus:outline-none" />
        </div>
        <div class="flex items-center gap-2 bg-neutral-800 border border-neutral-700 px-3 py-2 rounded-full">
          <img src="https://i.pravatar.cc/100?img=12" alt="Admin" class="w-7 h-7 rounded-full" />
          <span class="text-xs text-gray-400">Admin • Owner</span>
        </div>
      </div>

      <!-- User Table -->
      <div class="p-6">
        <h2 class="text-2xl font-bold text-orange-500 mb-6">User Management</h2>

        @if(session('success'))
          <div class="bg-green-700 text-white px-4 py-2 rounded mb-6 text-center">
            {{ session('success') }}
          </div>
        @endif

        <div class="overflow-x-auto">
          <table class="w-full text-left border-collapse">
            <thead>
              <tr class="bg-neutral-800 text-orange-400">
                <th class="px-4 py-3 border-b border-neutral-700">Username</th>
                <th class="px-4 py-3 border-b border-neutral-700">Full Name</th>
                <th class="px-4 py-3 border-b border-neutral-700">Email</th>
                <th class="px-4 py-3 border-b border-neutral-700">Role</th>
                <th class="px-4 py-3 border-b border-neutral-700">Actions</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($users as $user)
                <tr class="hover:bg-neutral-800 transition-colors duration-200">
                  <td class="px-4 py-3 border-b border-neutral-700">{{ $user->username }}</td>
                  <td class="px-4 py-3 border-b border-neutral-700">{{ $user->first_name }} {{ $user->middle_name }} {{ $user->last_name }}</td>
                  <td class="px-4 py-3 border-b border-neutral-700">{{ $user->email }}</td>
                  <td class="px-4 py-3 border-b border-neutral-700">{{ ucfirst($user->role) }}</td>
                  <td class="px-4 py-3 border-b border-neutral-700 flex gap-2">
                    <a href="{{ route('users.edit', $user->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm transition-all duration-200">
                      Edit
                    </a>
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}" onsubmit="return confirm('Delete this user?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded text-sm transition-all duration-200">
                        Delete
                      </button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </main>
  </div>
</body>
</html>