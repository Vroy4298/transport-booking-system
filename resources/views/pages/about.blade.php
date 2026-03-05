@extends('layouts.public')

@section('title', 'About Us')
@section('meta_description', 'Learn about Speed On Transport — our mission, values, and commitment to reliable transport services.')

@section('content')

{{-- Hero --}}
<section class="py-24 px-6 text-center relative overflow-hidden">
  <div class="absolute inset-0" style="background-image: radial-gradient(ellipse at 50% 0%, rgba(245,158,11,0.1) 0%, transparent 60%);"></div>
  <div class="relative max-w-3xl mx-auto">
    <span class="text-amber-400 text-sm font-semibold uppercase tracking-widest">Our Story</span>
    <h1 class="text-5xl font-extrabold text-white mt-3 mb-5">About <span class="gradient-text">Speed On Transport</span></h1>
    <p class="text-gray-400 text-lg leading-relaxed">
      We started with a simple promise — to make transport reliable, transparent, and affordable for every Indian. Today, we serve hundreds of customers across cities with a growing fleet and a team that cares.
    </p>
  </div>
</section>

{{-- Mission / Vision --}}
<section class="py-16 px-6 max-w-6xl mx-auto">
  <div class="grid md:grid-cols-2 gap-8">
    <div class="glass rounded-2xl p-8 card-hover">
      <div class="w-12 h-12 bg-amber-500/15 rounded-xl flex items-center justify-center mb-5">
        <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
      </div>
      <h3 class="text-white font-bold text-xl mb-3">Our Mission</h3>
      <p class="text-gray-400 leading-relaxed">To provide every customer with a seamless, safe, and timely transport experience — whether it's a city ride, an intercity journey, or a cargo shipment.</p>
    </div>
    <div class="glass rounded-2xl p-8 card-hover">
      <div class="w-12 h-12 bg-amber-500/15 rounded-xl flex items-center justify-center mb-5">
        <svg class="w-6 h-6 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
      </div>
      <h3 class="text-white font-bold text-xl mb-3">Our Vision</h3>
      <p class="text-gray-400 leading-relaxed">To become India's most trusted transport partner — connecting communities, businesses, and people through efficient and modern logistics.</p>
    </div>
  </div>
</section>

{{-- Values --}}
<section class="py-16 px-6 bg-slate-800/40">
  <div class="max-w-5xl mx-auto">
    <div class="text-center mb-12">
      <span class="text-amber-400 text-sm font-semibold uppercase tracking-widest">What We Stand For</span>
      <h2 class="text-3xl font-bold text-white mt-2">Our Core Values</h2>
    </div>
    <div class="grid md:grid-cols-3 gap-6">
      @foreach([
        ['Safety','Every vehicle is inspected and every driver is trained for your complete safety.'],
        ['Punctuality','We understand the value of time. Delays are not in our vocabulary.'],
        ['Transparency','No hidden charges. No surprises. Just honest, clear pricing every time.'],
      ] as $i => [$val,$desc])
      <div class="text-center glass rounded-2xl p-8 card-hover">
        <div class="text-3xl font-extrabold gradient-text mb-3">0{{ $i+1 }}</div>
        <h4 class="text-white font-bold text-lg mb-2">{{ $val }}</h4>
        <p class="text-gray-400 text-sm">{{ $desc }}</p>
      </div>
      @endforeach
    </div>
  </div>
</section>

{{-- CTA --}}
<section class="py-20 px-6 text-center">
  <div class="max-w-2xl mx-auto">
    <h2 class="text-3xl font-bold text-white mb-4">Ready to ride with us?</h2>
    <p class="text-gray-400 mb-8">Experience transport the way it should be — reliable, safe, and affordable.</p>
    <a href="/book" class="btn-gold text-slate-900 font-bold px-8 py-4 rounded-xl text-lg inline-block">Book Now →</a>
  </div>
</section>

@endsection
