<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin — Speed On Transport</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    .sidebar-link {
      display: flex;
      align-items: center;
      gap: 10px;
      padding: 10px 14px;
      border-radius: 10px;
      color: #94a3b8;
      font-size: 0.875rem;
      font-weight: 500;
      transition: all 0.2s;
    }

    .sidebar-link:hover,
    .sidebar-link.active {
      background: rgba(245, 158, 11, 0.12);
      color: #f59e0b;
    }

    ::-webkit-scrollbar {
      width: 5px;
    }

    ::-webkit-scrollbar-track {
      background: #0f172a;
    }

    ::-webkit-scrollbar-thumb {
      background: #f59e0b;
      border-radius: 4px;
    }

    .glass {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(10px);
      border: 1px solid rgba(255, 255, 255, 0.08);
    }
  </style>
</head>

<body class="bg-slate-900 text-gray-200 flex h-screen overflow-hidden">

  <!-- Sidebar -->
  <aside class="w-60 bg-slate-950 border-r border-white/10 flex flex-col flex-shrink-0">
    <!-- Brand -->
    <div class="h-16 flex items-center px-5 border-b border-white/10">
      <div class="w-7 h-7 bg-amber-500 rounded-lg flex items-center justify-center mr-2">
        <svg class="w-4 h-4 text-slate-900" fill="currentColor" viewBox="0 0 24 24">
          <path
            d="M18 18.5a1.5 1.5 0 01-1.5 1.5A1.5 1.5 0 0115 18.5a1.5 1.5 0 011.5-1.5 1.5 1.5 0 011.5 1.5M1.5 18.5A1.5 1.5 0 003 20a1.5 1.5 0 001.5-1.5A1.5 1.5 0 003 17a1.5 1.5 0 00-1.5 1.5M20 8l-2.5-5H6L3.5 8H2a1 1 0 00-1 1v2a1 1 0 001 1h1.5v6h1V11h13v7h1v-6H20a1 1 0 001-1V9a1 1 0 00-1-1h-1.5" />
        </svg>
      </div>
      <span class="text-white font-bold text-base">Speed<span class="text-amber-400">On</span></span>
    </div>

    <!-- Nav -->
    <nav class="flex-1 px-3 py-5 space-y-1 overflow-y-auto">
      <a href="/dashboard" class="sidebar-link {{ request()->is('dashboard') ? 'active' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        Dashboard
      </a>
      <a href="/admin/bookings" class="sidebar-link {{ request()->is('admin/bookings') ? 'active' : '' }}">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
        </svg>
        Bookings
      </a>
      <a href="{{ route('book.export') }}" class="sidebar-link">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
        </svg>
        Export Excel
      </a>
      <a href="/" class="sidebar-link mt-4">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
        </svg>
        View Website
      </a>
    </nav>

    <!-- User / Logout -->
    <div class="px-3 py-4 border-t border-white/10">
      <div class="flex items-center gap-3 px-2 mb-3">
        <div class="w-8 h-8 bg-amber-500/20 rounded-full flex items-center justify-center">
          <svg class="w-4 h-4 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
          </svg>
        </div>
        <div>
          <p class="text-xs font-semibold text-white">{{ Auth::user()->name ?? 'Admin' }}</p>
          <p class="text-xs text-gray-500">Administrator</p>
        </div>
      </div>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="sidebar-link w-full text-left text-red-400 hover:bg-red-500/10 hover:text-red-300">
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
          </svg>
          Logout
        </button>
      </form>
    </div>
  </aside>

  <!-- Main content -->
  <div class="flex-1 flex flex-col overflow-hidden">
    <!-- Top bar -->
    <header class="h-16 bg-slate-900 border-b border-white/10 flex items-center px-6 flex-shrink-0">
      <h1 class="text-sm font-semibold text-gray-400">Admin Panel</h1>
      <span class="mx-2 text-gray-600">/</span>
      <span class="text-sm font-semibold text-white">@yield('page_title', 'Dashboard')</span>
    </header>

    <!-- Scrollable content -->
    <main class="flex-1 overflow-y-auto p-6 bg-slate-900">
      @yield('content')
    </main>
  </div>

</body>

</html>