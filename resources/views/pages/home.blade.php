@extends('layouts.public')

@section('content')
  <!-- Hero Section -->
  <div class="text-center py-12">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">
      Welcome to Speed On Transport
    </h1>
    <p class="text-lg text-gray-600 mb-6">
      Reliable and affordable transportation services at your fingertips.
    </p>
    <a href="/book" 
       class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
      Book a Ride Now
    </a>
  </div>

  <!-- Services Preview -->
  <div class="mt-12">
    <h2 class="text-2xl font-bold mb-6 text-center">Our Services</h2>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white shadow rounded-lg p-6 text-center">
        <h3 class="font-semibold text-lg mb-2">Local Transport</h3>
        <p class="text-gray-600">Quick and reliable transport solutions within the city.</p>
      </div>
      <div class="bg-white shadow rounded-lg p-6 text-center">
        <h3 class="font-semibold text-lg mb-2">Long Distance</h3>
        <p class="text-gray-600">Safe and affordable travel for long-distance routes.</p>
      </div>
      <div class="bg-white shadow rounded-lg p-6 text-center">
        <h3 class="font-semibold text-lg mb-2">Goods Delivery</h3>
        <p class="text-gray-600">Efficient transport of goods and cargo with tracking.</p>
      </div>
    </div>
  </div>
@endsection
