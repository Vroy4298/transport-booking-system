<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Admin - Speed On Transport</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-100">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  <!-- 🔹 Navbar -->
  <nav class="bg-gray-800 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
      <a href="/dashboard" class="text-lg font-bold">Admin Panel</a>
      <div class="space-x-6">
        <a href="/dashboard" class="hover:underline">Dashboard</a>
        <a href="/admin/bookings" class="hover:underline">Bookings</a>
        <form action="{{ route('logout') }}" method="POST" class="inline">
          @csrf
          <button type="submit" class="hover:underline">Logout</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- 🔹 Page Content -->
  <main class="max-w-7xl mx-auto p-6">
    @yield('content')
  </main>

</body>
</html>
