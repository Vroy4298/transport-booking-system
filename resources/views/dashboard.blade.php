@extends('layouts.admin')

@section('content')
  <h1 class="text-2xl font-bold mb-6">Admin Dashboard</h1>

  <!-- Stats Cards -->
  <div class="grid md:grid-cols-4 gap-6 mb-8">
    <div class="bg-white p-6 rounded-lg shadow text-center">
      <h2 class="text-lg font-semibold text-gray-600">Total Bookings</h2>
      <p class="text-3xl font-bold text-gray-900 mt-2">{{ $total }}</p>
    </div>
    <div class="bg-yellow-50 p-6 rounded-lg shadow text-center">
      <h2 class="text-lg font-semibold text-yellow-700">Pending</h2>
      <p class="text-3xl font-bold text-yellow-900 mt-2">{{ $pending }}</p>
    </div>
    <div class="bg-green-50 p-6 rounded-lg shadow text-center">
      <h2 class="text-lg font-semibold text-green-700">Confirmed</h2>
      <p class="text-3xl font-bold text-green-900 mt-2">{{ $confirmed }}</p>
    </div>
    <div class="bg-red-50 p-6 rounded-lg shadow text-center">
      <h2 class="text-lg font-semibold text-red-700">Cancelled</h2>
      <p class="text-3xl font-bold text-red-900 mt-2">{{ $cancelled }}</p>
    </div>
  </div>

  <!-- Quick Links -->
  <div class="bg-white p-6 rounded-lg shadow mb-8">
    <h2 class="text-xl font-bold mb-4">Quick Actions</h2>
    <div class="space-x-4">
      <a href="{{ route('book.index') }}" 
         class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">View Bookings</a>
      <a href="{{ route('book.export') }}" 
         class="px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700">Export Bookings</a>
    </div>
  </div>

  <!-- Chart Section -->
<div class="bg-white p-6 rounded-lg shadow">
  <h2 class="text-xl font-bold mb-4">Bookings Overview</h2>
  <div class="max-w-md mx-auto"> <!-- limit chart width -->
    <canvas id="bookingsChart"></canvas>
  </div>
</div>

<!-- Bar Chart Section -->
<div class="bg-white p-6 rounded-lg shadow mt-8">
  <h2 class="text-xl font-bold mb-4">Bookings in Last 7 Days</h2>
  <div class="h-64">
    <canvas id="bookingsByDateChart"></canvas>
  </div>
</div>

<!-- Latest Bookings Section -->
<div class="bg-white p-6 rounded-lg shadow mt-8">
  <h2 class="text-xl font-bold mb-4">Latest Bookings</h2>
  <div class="overflow-x-auto">
    <table class="w-full border-collapse border border-gray-300 text-sm">
      <thead class="bg-gray-100">
        <tr>
          <th class="border p-2">Name</th>
          <th class="border p-2">Phone</th>
          <th class="border p-2">Pickup</th>
          <th class="border p-2">Dropoff</th>
          <th class="border p-2">Status</th>
          <th class="border p-2">Date</th>
        </tr>
      </thead>
      <tbody>
        @forelse($latestBookings as $b)
          <tr class="hover:bg-gray-50">
            <td class="border p-2">{{ $b->name }}</td>
            <td class="border p-2">{{ $b->phone }}</td>
            <td class="border p-2">{{ $b->pickup_location }}</td>
            <td class="border p-2">{{ $b->dropoff_location }}</td>
            <td class="border p-2">
              <span class="px-2 py-1 rounded text-xs font-semibold
                @if($b->status == 'pending') bg-yellow-100 text-yellow-700
                @elseif($b->status == 'confirmed') bg-green-100 text-green-700
                @else bg-red-100 text-red-700
                @endif">
                {{ ucfirst($b->status) }}
              </span>
            </td>
            <td class="border p-2">{{ $b->created_at->format('Y-m-d H:i') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center py-4">No bookings yet.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>


<script>
  const ctx2 = document.getElementById('bookingsByDateChart').getContext('2d');
  new Chart(ctx2, {
    type: 'bar',
    data: {
      labels: @json($chartByDate['labels']),
      datasets: [{
        label: 'Bookings',
        data: @json($chartByDate['values']),
        backgroundColor: '#3b82f6' // Tailwind blue
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false }
      },
      scales: {
        y: {
          beginAtZero: true,
          ticks: { stepSize: 1 }
        }
      }
    }
  });
</script>

 <!-- Chart.js Script -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('bookingsChart').getContext('2d');
  new Chart(ctx, {
    type: 'pie',
    data: {
      labels: @json($chartData['labels']),
      datasets: [{
        data: @json($chartData['values']),
        backgroundColor: ['#facc15', '#22c55e', '#ef4444'],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false, // allow custom sizing
      plugins: {
        legend: { position: 'bottom' }
      }
    }
  });
</script>
@endsection
