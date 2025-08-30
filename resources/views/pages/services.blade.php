@extends('layouts.public')

@section('content')
  <div class="py-8">
    <h1 class="text-3xl font-bold mb-6 text-center">Our Services</h1>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white shadow rounded-lg p-6">
        <h3 class="font-semibold text-lg mb-2">Local Transport</h3>
        <p class="text-gray-600">Quick trips inside the city with affordable rates.</p>
      </div>
      <div class="bg-white shadow rounded-lg p-6">
        <h3 class="font-semibold text-lg mb-2">Intercity Rides</h3>
        <p class="text-gray-600">Safe and reliable transport for long-distance travel.</p>
      </div>
      <div class="bg-white shadow rounded-lg p-6">
        <h3 class="font-semibold text-lg mb-2">Goods Delivery</h3>
        <p class="text-gray-600">Dedicated fleet for goods delivery with tracking.</p>
      </div>
    </div>
  </div>
@endsection
