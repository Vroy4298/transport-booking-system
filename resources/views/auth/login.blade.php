<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — Speed On Transport</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    * {
      font-family: 'Poppins', sans-serif;
    }

    .glass {
      background: rgba(255, 255, 255, 0.06);
      backdrop-filter: blur(12px);
      border: 1px solid rgba(255, 255, 255, 0.10);
    }

    .btn-gold {
      background: linear-gradient(135deg, #f59e0b, #d97706);
      transition: all 0.3s ease;
    }

    .btn-gold:hover {
      background: linear-gradient(135deg, #d97706, #b45309);
      transform: translateY(-1px);
    }
  </style>
</head>

<body class="bg-slate-900 min-h-screen flex items-center justify-center px-4"
  style="background-image: radial-gradient(ellipse at 50% 0%, rgba(245,158,11,0.08) 0%, transparent 60%);">

  <div class="w-full max-w-md">

    {{-- Logo --}}
    <div class="text-center mb-8">
      <a href="/" class="inline-flex items-center gap-2 justify-center">
        <div class="w-9 h-9 bg-amber-500 rounded-xl flex items-center justify-center">
          <svg class="w-5 h-5 text-slate-900" fill="currentColor" viewBox="0 0 24 24">
            <path
              d="M18 18.5a1.5 1.5 0 01-1.5 1.5A1.5 1.5 0 0115 18.5a1.5 1.5 0 011.5-1.5 1.5 1.5 0 011.5 1.5M1.5 18.5A1.5 1.5 0 003 20a1.5 1.5 0 001.5-1.5A1.5 1.5 0 003 17a1.5 1.5 0 00-1.5 1.5M20 8l-2.5-5H6L3.5 8H2a1 1 0 00-1 1v2a1 1 0 001 1h1.5v6h1V11h13v7h1v-6H20a1 1 0 001-1V9a1 1 0 00-1-1h-1.5" />
          </svg>
        </div>
        <span class="text-white font-bold text-xl">Speed<span class="text-amber-400">On</span></span>
      </a>
      <h1 class="text-2xl font-bold text-white mt-4">Welcome back</h1>
      <p class="text-gray-400 text-sm mt-1">Sign in to your admin account</p>
    </div>

    {{-- Session Status --}}
    @if (session('status'))
      <div class="mb-5 p-4 bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 rounded-xl text-sm">
        {{ session('status') }}
      </div>
    @endif

    {{-- Validation Errors --}}
    @if ($errors->any())
      <div class="mb-5 p-4 bg-red-500/15 border border-red-500/30 text-red-300 rounded-xl text-sm">
        <p class="font-semibold mb-1">Login failed:</p>
        <ul class="list-disc list-inside space-y-1">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    {{-- Form --}}
    <div class="glass rounded-2xl p-8">
      <form method="POST" action="{{ route('login') }}" class="space-y-5">
        @csrf

        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Email Address</label>
          <input type="email" name="email" value="{{ old('email') }}" required autofocus placeholder="you@example.com"
            class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
        </div>

        <div>
          <div class="flex justify-between items-center mb-1">
            <label class="text-sm font-medium text-gray-300">Password</label>
            @if (Route::has('password.request'))
              <a href="{{ route('password.request') }}"
                class="text-xs text-amber-400 hover:text-amber-300 transition-colors">Forgot password?</a>
            @endif
          </div>
          <input type="password" name="password" required placeholder="Your password"
            class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
        </div>

        <div class="flex items-center gap-2">
          <input type="checkbox" name="remember" id="remember" class="w-4 h-4 accent-amber-500">
          <label for="remember" class="text-sm text-gray-400">Remember me</label>
        </div>

        <button type="submit" class="btn-gold w-full text-slate-900 font-bold py-3 rounded-xl text-base shadow-lg">
          Sign In →
        </button>
      </form>

      <p class="text-center text-sm text-gray-400 mt-6">
        Don't have an account?
        <a href="{{ route('register') }}"
          class="text-amber-400 hover:text-amber-300 font-semibold transition-colors">Register here</a>
      </p>
    </div>

    <p class="text-center mt-6">
      <a href="/" class="text-gray-500 hover:text-gray-300 text-sm transition-colors">← Back to website</a>
    </p>

  </div>
</body>

</html>