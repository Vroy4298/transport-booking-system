@extends('layouts.public')

@section('title', 'Contact Us')
@section('meta_description', 'Get in touch with Speed On Transport. We are available 24/7 for your transport and logistics queries.')

@section('content')

  {{-- Hero --}}
  <section class="py-24 px-6 text-center relative overflow-hidden">
    <div class="absolute inset-0"
      style="background-image: radial-gradient(ellipse at 50% 0%, rgba(245,158,11,0.1) 0%, transparent 60%);"></div>
    <div class="relative max-w-2xl mx-auto">
      <span class="text-amber-400 text-sm font-semibold uppercase tracking-widest">Reach Out</span>
      <h1 class="text-5xl font-extrabold text-white mt-3 mb-5">Contact <span class="gradient-text">Us</span></h1>
      <p class="text-gray-400 text-lg">Have a question, quote request, or just want to say hello? We'd love to hear from
        you.</p>
    </div>
  </section>

  {{-- Content --}}
  <section class="pb-24 px-6 max-w-5xl mx-auto">
    <div class="grid md:grid-cols-2 gap-10 items-start">

      {{-- Info --}}
      <div class="space-y-6">
        <div class="glass rounded-2xl p-6 flex items-start gap-4">
          <div class="w-10 h-10 bg-amber-500/15 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <div>
            <h4 class="text-white font-semibold mb-1">Email Us</h4>
            <p class="text-gray-400 text-sm">vroy4298@gmail.com</p>
          </div>
        </div>
        <div class="glass rounded-2xl p-6 flex items-start gap-4">
          <div class="w-10 h-10 bg-amber-500/15 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </div>
          <div>
            <h4 class="text-white font-semibold mb-1">Call / WhatsApp</h4>
            <p class="text-gray-400 text-sm">Available 24/7 — message us anytime</p>
          </div>
        </div>
        <div class="glass rounded-2xl p-6 flex items-start gap-4">
          <div class="w-10 h-10 bg-amber-500/15 rounded-xl flex items-center justify-center flex-shrink-0">
            <svg class="w-5 h-5 text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
          </div>
          <div>
            <h4 class="text-white font-semibold mb-1">Business Hours</h4>
            <p class="text-gray-400 text-sm">Mon–Sat: 8am – 9pm<br>Sun: 10am – 6pm</p>
          </div>
        </div>
      </div>

      {{-- Form (static — no backend route yet for contact) --}}
      <div class="glass rounded-2xl p-8">
        <h2 class="text-xl font-bold text-white mb-6">Send a Message</h2>
        <form action="#" method="POST" class="space-y-5">
          @csrf
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Your Name</label>
            <input type="text" name="name" required placeholder="John Doe"
              class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Email</label>
            <input type="email" name="email" required placeholder="john@example.com"
              class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
          </div>
          <div>
            <label class="block text-sm font-medium text-gray-300 mb-1">Message</label>
            <textarea name="message" rows="4" required placeholder="Write your message here..."
              class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-3 rounded-xl focus:outline-none focus:ring-2 focus:ring-amber-500 transition resize-none"></textarea>
          </div>
          <button type="submit" class="btn-gold w-full text-slate-900 font-bold py-3 rounded-xl">
            Send Message →
          </button>
        </form>
      </div>
    </div>
  </section>

@endsection