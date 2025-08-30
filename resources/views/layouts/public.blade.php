<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Speed On Transport</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans bg-gray-50">

  <!-- 🌐 Navbar -->
  <nav class="bg-blue-600 text-white shadow">
    <div class="max-w-7xl mx-auto px-4 flex justify-between items-center h-16">
      <a href="/" class="text-lg font-bold">Speed On Transport</a>
      <div class="space-x-6">
        <a href="/" class="hover:underline">Home</a>
        <a href="/about" class="hover:underline">About</a>
        <a href="/services" class="hover:underline">Services</a>
        <a href="/contact" class="hover:underline">Contact</a>
        <a href="/book" class="bg-white text-blue-600 px-3 py-1 rounded hover:bg-gray-100">Book Now</a>
      </div>
    </div>
  </nav>

  <!-- 📄 Page Content -->
  <main class="max-w-5xl mx-auto p-6">
    @yield('content')
  </main>

  <!-- 📌 Footer -->
  <footer class="bg-gray-800 text-gray-300 py-6 mt-12">
    <div class="max-w-7xl mx-auto px-4 flex justify-between">
      <p>&copy; {{ date('Y') }} Speed On Transport. All rights reserved.</p>
      <p>Developed by Vivek Kumar</p>
    </div>
  </footer>

</body>
</html>
