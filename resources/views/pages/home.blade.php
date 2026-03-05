@extends('layouts.public')

@section('title', 'Home')
@section('meta_description', 'Speed On Transport — reliable, affordable transport and cargo delivery services across India. Book your ride today.')

@section('content')

  {{-- Hero --}}
  <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- Background gradient --}}
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>
    <div class="absolute inset-0"
      style="background-image: radial-gradient(ellipse at 60% 20%, rgba(245,158,11,0.12) 0%, transparent 60%);"></div>
    {{-- Subtle grid --}}
    <div class="absolute inset-0 opacity-5"
      style="background-image: linear-gradient(rgba(255,255,255,.2) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.2) 1px,transparent 1px); background-size:40px 40px">
    </div>

    <div class="relative max-w-5xl mx-auto px-6 text-center">
      <div
        class="inline-flex items-center gap-2 bg-amber-500/10 border border-amber-500/30 text-amber-400 text-xs font-semibold px-4 py-2 rounded-full mb-6 tracking-widest uppercase">
        <span class="w-2 h-2 bg-amber-400 rounded-full animate-pulse"></span>
        Available 24/7 Across India
      </div>
      <h1 class="text-5xl md:text-7xl font-extrabold text-white leading-tight mb-6">
        Transport That
        <span class="gradient-text block mt-1">You Can Trust</span>
      </h1>
      <p class="text-gray-400 text-lg md:text-xl max-w-2xl mx-auto mb-10 leading-relaxed">
        From city pickups to long-distance cargo — Speed On Transport gets you there safely, on time, every time.
      </p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="/book"
          class="btn-gold text-slate-900 font-bold px-8 py-4 rounded-xl text-lg shadow-xl inline-flex items-center gap-2">
          Book a Ride Now
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
          </svg>
        </a>
        <a href="/services"
          class="glass text-white font-semibold px-8 py-4 rounded-xl text-lg hover:bg-white/10 transition-all inline-flex items-center gap-2">
          View Services
          <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
          </svg>
        </a>
      </div>
    </div>

    {{-- Scroll indicator --}}
    <div
      class="absolute bottom-8 left-1/2 -translate-x-1/2 text-gray-500 text-xs flex flex-col items-center gap-2 animate-bounce">
      <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
      </svg>
    </div>
  </section>

  {{-- Stats Bar --}}
  <section class="bg-amber-500 py-8">
    <div class="max-w-5xl mx-auto px-6">
      <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center text-slate-900">
        <div>
          <p class="text-3xl font-extrabold">500+</p>
          <p class="text-sm font-semibold opacity-80 mt-1">Happy Clients</p>
        </div>
        <div>
          <p class="text-3xl font-extrabold">10K+</p>
          <p class="text-sm font-semibold opacity-80 mt-1">Trips Completed</p>
        </div>
        <div>
          <p class="text-3xl font-extrabold">15+</p>
          <p class="text-sm font-semibold opacity-80 mt-1">Vehicle Types</p>
        </div>
        <div>
          <p class="text-3xl font-extrabold">5 ★</p>
          <p class="text-sm font-semibold opacity-80 mt-1">Average Rating</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Services Preview --}}
  <section class="py-24 px-6 max-w-7xl mx-auto">
    <div class="text-center mb-14">
      <span class="text-amber-400 text-sm font-semibold uppercase tracking-widest">What We Offer</span>
      <h2 class="text-4xl font-bold text-white mt-2">Our Core Services</h2>
      <p class="text-gray-400 mt-3 max-w-xl mx-auto">Safe, reliable, and affordable transport solutions for individuals
        and businesses.</p>
    </div>
    <div class="grid md:grid-cols-3 gap-8">
      @foreach([
          ['icon' => 'M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4', 'title' => 'Local Transport', 'desc' => 'Quick and reliable city trips at affordable rates. Perfect for everyday needs.'],
          ['icon' => 'M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z', 'title' => 'Long Distance', 'desc' => 'Safe intercity and interstate transport for passengers and goods.'],
          ['icon' => 'M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4', 'title' => 'Goods Delivery', 'desc' => 'Dedicated vehicle fleet with real-time tracking for cargo and packages.'],
        ] as $svc)
         <div class="glass rounded-2xl p-8 card-hover text-center">
          <div class="w-14 h-14 bg-amber-500/15 rounded-xl flex items-center justify-center mx-auto mb-5">
            <svg class="w-7 h-7 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $svc['icon'] }}"/>
            </svg>
          </div>
          <h3 class="text-white font-bold text-lg mb-3">{{ $svc['title'] }}</h3>
          <p class="text-gray-400 text-sm leading-relaxed">{{ $svc['desc'] }}</p>
        </div>

       @endforeach
    </div>


            <div class="text-center mt-10">
      <a href="/services" class="text-amber-400 hover:text-amber-300 font-semibold inline-flex items-center gap-1 transition-colors">
        See all services
        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>
  </section>

  {{-- Why Choose Us --}}
  <section class="py-20 bg-slate-800/50">
    <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-14 items-center">
      <div>
        <span class="text-amber-400 text-sm font-semibold uppercase tracking-widest">Why Choose Us</span>
        <h2 class="text-4xl font-bold text-white mt-2 mb-6">Built on reliability, trust & speed</h2>
        <div class="space-y-5">


                        @foreach(['On-time guarantee — we value your schedule', 'Trained, professional drivers', 'GPS-tracked vehicles for full transparency', 'Competitive transparent pricing', '24/7 customer support'] as $pt)
                          <div class="flex items-start gap-3">
                            <div class="w-5 h-5 bg-amber-500 rounded-full flex items-center justify-center flex-shrink-0 mt-0.5">
                              <svg class="w-3 h-3 text-slate-900" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                            </div>
                            <p class="text-gray-300">{{ $pt }}</p>
                          </div>
                        @endforeach
        </div>
      </div>
      <div class="glass rounded-2xl p-10 text-center">
        <div class="text-6xl font-extrabold gradient-text mb-2">5+ yrs</div>
        <p class="text-gray-400 mb-8">of trusted transport experience</p>
        <a href="/book" class="btn-gold text-slate-900 font-bold px-6 py-3 rounded-xl inline-block">Book Now →</a>
      </div>
    </div>
  </section>

  {{-- CTA Strip --}}
  <section class="py-20 px-6 text-center">
    <div class="max-w-3xl mx-auto glass rounded-3xl p-14">
      <h2 class="text-4xl font-bold text-white mb-4">Ready to book your next ride?</h2>
      <p class="text-gray-400 mb-8">Fill out a quick form and we'll get back to you within minutes.</p>
      <a href="/book" class="btn-gold text-slate-900 font-bold px-10 py-4 rounded-xl text-lg shadow-xl inline-block">
        Book a Ride Now →
      </a>
    </div>
  </section>

@endsection
