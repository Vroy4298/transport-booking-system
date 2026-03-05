<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Speed On Transport') — Speed On Transport</title>
  <meta name="description"
    content="@yield('meta_description', 'Reliable and affordable transportation and logistics services. Book your ride or goods delivery today.')">
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    .glass {
      background: rgba(255, 255, 255, 0.07);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.12);
    }

    .gradient-text {
      background: linear-gradient(135deg, #f59e0b, #fcd34d);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .btn-gold {
      background: linear-gradient(135deg, #f59e0b, #d97706);
      transition: all 0.3s ease;
    }

    .btn-gold:hover {
      background: linear-gradient(135deg, #d97706, #b45309);
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(245, 158, 11, 0.35);
    }

    .nav-link {
      position: relative;
    }

    .nav-link::after {
      content: '';
      position: absolute;
      bottom: -2px;
      left: 0;
      width: 0;
      height: 2px;
      background: #f59e0b;
      transition: width 0.3s ease;
    }

    .nav-link:hover::after {
      width: 100%;
    }

    .card-hover {
      transition: all 0.3s ease;
    }

    .card-hover:hover {
      transform: translateY(-6px);
      box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
    }

    html {
      scroll-behavior: smooth;
    }

    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-track {
      background: #1e293b;
    }

    ::-webkit-scrollbar-thumb {
      background: #f59e0b;
      border-radius: 3px;
    }

    .mobile-menu {
      display: none;
    }

    .mobile-menu.open {
      display: block;
    }
  </style>
</head>

<body class="bg-slate-900 text-gray-100">

  <!-- Navbar -->
  <nav class="fixed top-0 left-0 right-0 z-50 glass border-b border-white/10 shadow-xl">
    <div class="max-w-7xl mx-auto px-6 flex justify-between items-center h-16">

      <!-- Logo -->
      <a href="/" class="flex items-center gap-2">
        <div class="w-8 h-8 bg-amber-500 rounded-lg flex items-center justify-center">
          <svg class="w-5 h-5 text-slate-900" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M18 18.5a1.5 1.5 0 01-1.5 1.5A1.5 1.5 0 0115 18.5a1.5 1.5 0 011.5-1.5 1.5 1.5 0 011.5 1.5M1.5 18.5A1.5 1.5 0 003 20a1.5 1.5 0 001.5-1.5A1.5 1.5 0 003 17a1.5 1.5 0 00-1.5 1.5M20 8l-2.5-5H6L3.5 8H2a1 1 0 00-1 1v2a1 1 0 001 1h1.5v6h1V11h13v7h1v-6H20a1 1 0 001-1V9a1 1 0 00-1-1h-1.5M8 8H4.5l1.5-3H8v3m5 0H9V5h4v3m3 0h-2V5h.5l1.5 3z" />
          </svg>
        </div>
        <span class="text-white font-bold text-lg">Speed<span class="text-amber-400">On</span></span>
      </a>

      <!-- Desktop Nav -->
      <div class="hidden md:flex items-center gap-8">
        <a href="/" class="nav-link text-gray-300 hover:text-white text-sm font-medium transition-colors">Home</a>
        <a href="/about" class="nav-link text-gray-300 hover:text-white text-sm font-medium transition-colors">About</a>
        <a href="/services"
          class="nav-link text-gray-300 hover:text-white text-sm font-medium transition-colors">Services</a>
        <a href="/contact"
          class="nav-link text-gray-300 hover:text-white text-sm font-medium transition-colors">Contact</a>
        @auth
          <a href="/dashboard"
            class="nav-link text-amber-400 hover:text-amber-300 text-sm font-medium transition-colors">Dashboard</a>
        @endauth
        <a href="/book" class="btn-gold text-slate-900 font-semibold px-5 py-2 rounded-lg text-sm shadow-lg">
          Book Now →
        </a>
      </div>

      <!-- Mobile Hamburger -->
      <button id="menuToggle" class="md:hidden text-gray-300 hover:text-white p-2">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
        </svg>
      </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="mobile-menu md:hidden bg-slate-800 border-t border-white/10 px-6 py-4">
      <div class="flex flex-col gap-4">
        <a href="/" class="text-gray-300 hover:text-amber-400 font-medium transition-colors">Home</a>
        <a href="/about" class="text-gray-300 hover:text-amber-400 font-medium transition-colors">About</a>
        <a href="/services" class="text-gray-300 hover:text-amber-400 font-medium transition-colors">Services</a>
        <a href="/contact" class="text-gray-300 hover:text-amber-400 font-medium transition-colors">Contact</a>
        @auth
          <a href="/dashboard" class="text-amber-400 font-medium">Dashboard</a>
        @endauth
        <a href="/book" class="btn-gold text-slate-900 font-semibold px-4 py-2 rounded-lg text-center mt-2">Book Now
          →</a>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="pt-16">
    @yield('content')
  </div>

  <!-- Footer -->
  <footer class="bg-slate-950 border-t border-white/10 mt-20">
    <div class="max-w-7xl mx-auto px-6 py-12">
      <div class="grid md:grid-cols-3 gap-10">
        <!-- Brand -->
        <div>
          <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 bg-amber-500 rounded-lg flex items-center justify-center">
              <svg class="w-5 h-5 text-slate-900" fill="currentColor" viewBox="0 0 24 24">
                <path
                  d="M18 18.5a1.5 1.5 0 01-1.5 1.5A1.5 1.5 0 0115 18.5a1.5 1.5 0 011.5-1.5 1.5 1.5 0 011.5 1.5M1.5 18.5A1.5 1.5 0 003 20a1.5 1.5 0 001.5-1.5A1.5 1.5 0 003 17a1.5 1.5 0 00-1.5 1.5M20 8l-2.5-5H6L3.5 8H2a1 1 0 00-1 1v2a1 1 0 001 1h1.5v6h1V11h13v7h1v-6H20a1 1 0 001-1V9a1 1 0 00-1-1h-1.5" />
              </svg>
            </div>
            <span class="text-white font-bold text-lg">Speed<span class="text-amber-400">On</span></span>
          </div>
          <p class="text-gray-400 text-sm leading-relaxed">Reliable transport and logistics solutions. Your cargo and
            passengers — delivered safely, every time.</p>
        </div>
        <!-- Quick Links -->
        <div>
          <h4 class="text-white font-semibold mb-4">Quick Links</h4>
          <ul class="space-y-2 text-sm text-gray-400">
            <li><a href="/" class="hover:text-amber-400 transition-colors">Home</a></li>
            <li><a href="/about" class="hover:text-amber-400 transition-colors">About Us</a></li>
            <li><a href="/services" class="hover:text-amber-400 transition-colors">Services</a></li>
            <li><a href="/book" class="hover:text-amber-400 transition-colors">Book a Ride</a></li>
            <li><a href="/contact" class="hover:text-amber-400 transition-colors">Contact</a></li>
          </ul>
        </div>
        <!-- Contact -->
        <div>
          <h4 class="text-white font-semibold mb-4">Contact</h4>
          <ul class="space-y-2 text-sm text-gray-400">
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              vroy4298@gmail.com
            </li>
            <li class="flex items-center gap-2">
              <svg class="w-4 h-4 text-amber-400 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
              </svg>
              India
            </li>
          </ul>
        </div>
      </div>
      <div
        class="mt-10 pt-6 border-t border-white/10 flex flex-col md:flex-row justify-between items-center gap-2 text-sm text-gray-500">
        <p>&copy; {{ date('Y') }} Speed On Transport. All rights reserved.</p>
        <p>Built by <span class="text-amber-400">Vivek Kumar</span></p>
      </div>
    </div>
  </footer>

  <script>
    const menuToggle = document.getElementById('menuToggle');
    const mobileMenu = document.getElementById('mobileMenu');
    menuToggle.addEventListener('click', () => mobileMenu.classList.toggle('open'));
  </script>
</body>

</html>