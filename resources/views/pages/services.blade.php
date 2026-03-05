@extends('layouts.public')

@section('title', 'Our Services')
@section('meta_description', 'Explore Speed On Transport services — local transport, intercity rides, goods delivery, and more. Book online instantly.')

@section('content')

  {{-- Hero --}}
  <section class="py-24 px-6 text-center relative overflow-hidden">
    <div class="absolute inset-0"
      style="background-image: radial-gradient(ellipse at 50% 0%, rgba(245,158,11,0.1) 0%, transparent 60%);"></div>
    <div class="relative max-w-3xl mx-auto">
      <span class="text-amber-400 text-sm font-semibold uppercase tracking-widest">What We Offer</span>
      <h1 class="text-5xl font-extrabold text-white mt-3 mb-5">Our <span class="gradient-text">Services</span></h1>
      <p class="text-gray-400 text-lg leading-relaxed">
        A full range of transport and logistics solutions — tailored for individuals, businesses, and everything in
        between.
      </p>
    </div>
  </section>

  {{-- Service Cards --}}
  <section class="pb-24 px-6 max-w-7xl mx-auto">
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
      @foreach([
              ['M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4', 'Local Transport', 'Fast & affordable city pickups and drop-offs, any time of day.'],
              ['M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7', 'Intercity Rides', 'Safe and comfortable long-distance journeys across states.'],
              ['M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4', 'Goods Delivery', 'Door-to-door cargo delivery with real-time tracking.'],
              ['M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4', 'Mini Truck / Tata Ace', 'Perfect for moving small loads around the city quickly.'],
              ['M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15', 'Container / Trailer', 'Heavy-duty vehicles for bulk shipments and industrial cargo.'],
              ['M12 18h.01M8 21l4-4 4 4M3 4h18M4 20h16a1 1 0 001-1V5a1 1 0 00-1-1H4a1 1 0 00-1 1v14a1 1 0 001 1z', 'Corporate Contracts', 'Monthly and quarterly contracts for businesses with recurring transport needs.'],
            ] as [$icon, $title, $desc])
            <div class="glass rounded-2xl p-8 card-hover group">
              <div class="w-1
        4        h-14 bg-amber-500/15 rounded-xl flex items-center justify-center mb-5 group-hover:bg-amber-500/25 transition-colors">
                <svg class="w-7 h-7 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d
                  ="{{ $icon }}"/>

                        </svg>
              </div>
              <h3 class="text-white font-bold text-lg mb-3">{{ $title }}</h3>
              <p class="text-gray-400 text-sm leading-relaxed mb-6">{{ $desc }}</p>
              <a href="/book" class="text-amber-400 hover:text-amber-300 text-sm font-semibold inline-flex items-center gap-1 transition-colors">
                Book Now
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
              </a>
            </div>
      @endforeach
    </div>
  </section>

  {{-- Vehicl
         e types --}}
  <section class="py-20 bg-slate-800/40 px-6">
    <div class="max-w-5xl mx-auto text-center">
      <span class="text-amber-400 text-sm font-semibold uppercase tracking-widest">Fleet</span>
      <h2 class="text-3xl font-bold text-white mt-2 mb-4">Available Vehicle Types</h2>

             <div class="flex flex-wrap justify-center gap-3 mt-8">
        @foreach(['Mini Truck', 'Pickup', 'Tata Ace', 'Tempo', 'Container', 'Trailer', 'Custom'] as $v)
          <span class="glass border border-white/10 text-gray-300 px-5 py-2 rounded-full text-sm font-medium hover:border-amber-500/50 hover:text-amber-400 transition-colors cursor-default">{{ $v }}</span>
        @endforeach
      </div>      <div class="mt-10">
        <a href="/book" class="btn-gold text-slate-900 font-bold px-8 py-4 rounded-xl inline-block text-lg">Book Your Vehicle →</a>
      </div>
    </div>
  </section>

@endsection
