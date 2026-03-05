@extends('layouts.public')

@section('title', 'Book a Ride')
@section('meta_description', 'Book your transport with Speed On Transport. Fill in your pickup details and we will confirm your booking shortly.')

@section('content')

  <section class="py-20 px-6 relative overflow-hidden">
    <div class="absolute inset-0"
      style="background-image: radial-gradient(ellipse at 30% 10%, rgba(245,158,11,0.08) 0%, transparent 55%);"></div>
    <div class="relative max-w-2xl mx-auto">

      {{-- Header --}}
      <div class="text-center mb-10">
        <span class="text-amber-400 text-sm font-semibold uppercase tracking-widest">Get A Ride</span>
        <h1 class="text-4xl font-extrabold text-white mt-2">Book Your <span class="gradient-text">Ride</span></h1>
        <p class="text-gray-400 mt-2 text-sm">Fill out the form below and we'll confirm your booking promptly.</p>
      </div>

      {{-- Success --}}
      @if (session('success'))
        <div
          class="mb-6 p-4 bg-emerald-500/15 border border-emerald-500/40 text-emerald-300 rounded-xl flex items-start gap-3">
          <svg class="w-5 h-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
              d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
          </svg>
          <span>{{ session('success') }}</span>
        </div>
      @endif

      {{-- Errors --}}
      @if ($errors->any())
        <div class="mb-6 p-4 bg-red-500/15 border border-red-500/40 text-red-300 rounded-xl">
          <p class="font-semibold mb-2">Please fix the following:</p>
          <ul class="list-disc list-inside space-y-1 text-sm">
            @foreach ($errors->all() as $err)
              <li>{{ $err }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      {{-- Form --}}
      <form action="{{ route('book.store') }}" method="POST" class="glass rounded-2xl p-8 space-y-5">
        @csrf

        <div class="grid sm:grid-cols-2 gap-5">
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Full Name <span
                class="text-amber-400">*</span></label>
            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Your full name"
              class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Phone <span
                class="text-amber-400">*</span></label>
            <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="+91 XXXXX XXXXX"
              class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Email <span class="text-amber-400">*</span></label>
          <input type="email" name="email" value="{{ old('email') }}" required placeholder="you@example.com"
            class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Pickup Location <span
                class="text-amber-400">*</span></label>
            <input type="text" name="pickup_location" value="{{ old('pickup_location') }}" required
              placeholder="e.g. Mumbai, Dadar"
              class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Drop-off Location <span
                class="text-amber-400">*</span></label>
            <input type="text" name="dropoff_location" value="{{ old('dropoff_location') }}" required
              placeholder="e.g. Pune, Shivajinagar"
              class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
          </div>
        </div>

        <div class="grid sm:grid-cols-2 gap-5">
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Pickup Date <span
                class="text-amber-400">*</span></label>
            <input type="date" name="pickup_date" value="{{ old('pickup_date') }}" required
              class="w-full bg-slate-700/60 border border-white/10 text-white px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Pickup Time <span
                class="text-amber-400">*</span></label>
            <input type="time" name="pickup_time" value="{{ old('pickup_time') }}" required
              class="w-full bg-slate-700/60 border border-white/10 text-white px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
          </div>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Vehicle Type <span
              class="text-gray-500">(optional)</span></label>
          <select name="vehicle_type"
            class="w-full bg-slate-700/60 border border-white/10 text-white px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
            <option value="">-- Select a vehicle --</option>
            @foreach(['Mini Truck', 'Pickup', 'Tata Ace', 'Tempo', 'Container', 'Trailer', 'Other'] as $v)
              <option value="{{ $v }}" {{ old('vehicle_type') === $v ? 'selected' : '' }}>{{ $v }}</option>
            @endforeach
          </select>
        </div>

        <div>
          <label class="block text-sm font-medium text-gray-300 mb-1">Additional Notes <span
              class="text-gray-500">(optional)</span></label>
          <textarea name="notes" rows="3" placeholder="Special instructions, cargo details, etc."
            class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition resize-none">{{ old('notes') }}</textarea>
        </div>

        <button type="submit" class="btn-gold w-full text-slate-900 font-bold py-4 rounded-xl text-lg shadow-xl">
          Submit Booking →
        </button>
      </form>

    </div>
  </section>

@endsection