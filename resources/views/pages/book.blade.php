@extends('layouts.public')

@section('content')
  <h1 class="text-3xl font-bold mb-6">Book Your Ride</h1>

  <!-- Success Message -->
  @if (session('success'))
    <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded">
      {{ session('success') }}
    </div>
  @endif

  <!-- Validation Errors -->
  @if ($errors->any())
    <div class="mb-4 p-4 bg-red-100 border border-red-300 text-red-700 rounded">
      <strong>Fix these issues:</strong>
      <ul class="mt-2 list-disc list-inside">
        @foreach ($errors->all() as $err)
          <li>{{ $err }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('book.store') }}" method="POST" class="space-y-4 bg-white shadow rounded-lg p-6">
    @csrf

    <!-- Name -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Name</label>
      <input type="text" name="name" value="{{ old('name') }}" required
             class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Email -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Email</label>
      <input type="email" name="email" value="{{ old('email') }}" required
             class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Phone -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Phone</label>
      <input type="text" name="phone" value="{{ old('phone') }}" required
             class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Pickup Location -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Pickup Location</label>
      <input type="text" name="pickup_location" value="{{ old('pickup_location') }}" required
             class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Drop-off Location -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Drop-off Location</label>
      <input type="text" name="dropoff_location" value="{{ old('dropoff_location') }}" required
             class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
    </div>

    <!-- Date & Time -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
      <div>
        <label class="block text-sm font-medium text-gray-700">Pickup Date</label>
        <input type="date" name="pickup_date" value="{{ old('pickup_date') }}" required
               class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>
      <div>
        <label class="block text-sm font-medium text-gray-700">Pickup Time</label>
        <input type="time" name="pickup_time" value="{{ old('pickup_time') }}" required
               class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
      </div>
    </div>

    <!-- Vehicle Type -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Vehicle Type (optional)</label>
      <select name="vehicle_type"
              class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        <option value="">-- Select Vehicle --</option>
        <option value="Mini Truck" {{ old('vehicle_type')==='Mini Truck' ? 'selected' : '' }}>Mini Truck</option>
        <option value="Pickup" {{ old('vehicle_type')==='Pickup' ? 'selected' : '' }}>Pickup</option>
        <option value="Tata Ace" {{ old('vehicle_type')==='Tata Ace' ? 'selected' : '' }}>Tata Ace</option>
        <option value="Tempo" {{ old('vehicle_type')==='Tempo' ? 'selected' : '' }}>Tempo</option>
        <option value="Container" {{ old('vehicle_type')==='Container' ? 'selected' : '' }}>Container</option>
        <option value="Trailer" {{ old('vehicle_type')==='Trailer' ? 'selected' : '' }}>Trailer</option>
        <option value="Other" {{ old('vehicle_type')==='Other' ? 'selected' : '' }}>Other</option>
      </select>
    </div>

    <!-- Notes -->
    <div>
      <label class="block text-sm font-medium text-gray-700">Notes (optional)</label>
      <textarea name="notes" rows="4"
                class="mt-1 block w-full px-3 py-2 border rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">{{ old('notes') }}</textarea>
    </div>

    <!-- Submit -->
    <div>
      <button type="submit"
              class="w-full px-4 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700">
        Submit Booking
      </button>
    </div>
  </form>
@endsection
