<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Edit User — Wantunan ni PomPom</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-neutral-900 to-neutral-800 text-white min-h-screen font-sans">

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
        <a href="/users" class="px-3 py-2 rounded-lg bg-neutral-800">👤 Users</a>
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

      <!-- Edit User Form -->
      <div class="p-6">
        <h2 class="text-2xl font-bold text-orange-500 mb-6">Edit User</h2>

        <form action="/users/update" method="POST" class="bg-neutral-900 border border-neutral-700 rounded-lg p-6 space-y-6">
          <!-- Username -->
          <div>
            <label for="username" class="block text-sm text-gray-400 mb-1">Username</label>
            <input type="text" id="username" name="username" value="juan123"
              class="w-full px-4 py-2 rounded-lg bg-neutral-800 border border-neutral-700 text-white focus:ring-2 focus:ring-orange-500" />
          </div>

          <!-- Full Name -->
          <div class="grid grid-cols-3 gap-4">
            <div>
              <label for="first_name" class="block text-sm text-gray-400 mb-1">First Name</label>
              <input type="text" id="first_name" name="first_name" value="Juan"
                class="w-full px-4 py-2 rounded-lg bg-neutral-800 border border-neutral-700 text-white focus:ring-2 focus:ring-orange-500" />
            </div>
            <div>
              <label for="middle_name" class="block text-sm text-gray-400 mb-1">Middle Name</label>
              <input type="text" id="middle_name" name="middle_name" value="Dela"
                class="w-full px-4 py-2 rounded-lg bg-neutral-800 border border-neutral-700 text-white focus:ring-2 focus:ring-orange-500" />
            </div>
            <div>
              <label for="last_name" class="block text-sm text-gray-400 mb-1">Last Name</label>
              <input type="text" id="last_name" name="last_name" value="Cruz"
                class="w-full px-4 py-2 rounded-lg bg-neutral-800 border border-neutral-700 text-white focus:ring-2 focus:ring-orange-500" />
            </div>
          </div>

          <!-- Email -->
          <div>
            <label for="email" class="block text-sm text-gray-400 mb-1">Email</label>
            <input type="email" id="email" name="email" value="juan@example.com"
              class="w-full px-4 py-2 rounded-lg bg-neutral-800 border border-neutral-700 text-white focus:ring-2 focus:ring-orange-500" />
          </div>

          <!-- Role -->
          <div>
            <label for="role" class="block text-sm text-gray-400 mb-1">Role</label>
            <select id="role" name="role"
              class="w-full px-4 py-2 rounded-lg bg-neutral-800 border border-neutral-700 text-white focus:ring-2 focus:ring-orange-500">
              <option value="admin">Admin</option>
              <option value="staff" selected>Staff</option>
              <option value="owner">Owner</option>
            </select>
          </div>

          <!-- Submit Button -->
          <div class="flex justify-end">
            <button type="submit"
              class="bg-gradient-to-r from-orange-500 to-yellow-500 hover:from-orange-600 hover:to-yellow-600 text-white px-6 py-2 rounded-lg font-semibold shadow-md transition-all duration-200">
              💾 Save Changes
            </button>
          </div>
        </form>
      </div>
    </main>
  </div>

</body>
</html>