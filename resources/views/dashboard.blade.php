@extends('layouts.admin')

@section('page_title', 'Dashboard')

@section('content')

  {{-- Stat Cards --}}
  <div class="grid grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
    @foreach([
        ['Total', 'bg-slate-800', 'text-white', 'text-gray-400', $total, 'M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2'],
        ['Pending', 'bg-amber-500/15', 'text-amber-400', 'text-amber-300', $pending, 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
        ['Confirmed', 'bg-emerald-500/15', 'text-emerald-400', 'text-emerald-300', $confirmed, 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
        ['Cancelled', 'bg-red-500/15', 'text-red-400', 'text-red-300', $cancelled, 'M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z'],
      ] as [$label, $bg, $color, $labelColor, $val, $icon])
       <div class="glass rounded-2xl p-5 {{ $bg }}">
        <div class="flex items-center justify-between mb-3">
          <span class="text-xs font-semibold uppercase tracking-widest {{ $labelColor }}">{{ $label }}</span>
          <svg class="w-5 h-5 {{ $color }} opacity-60" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.8" d="{{ $icon }}"/>
          </svg>
        </div>
        <p class="text-4xl font-extrabold {{ $color }}">{{ $val }}</p>
      </div>
    @endforeach
  </div>

  {{-- Charts Row --}}
  <div class="grid lg:grid-cols-2 gap-6 mb-8">
    {{-- Pie Chart --}}
    <div class="glass rounded-2xl p-6">
      <h2 class="text-base font-bold text-white mb-4">Booking Status Overview</h2>
      <div class="max-w-[260px] mx-auto">
        <canvas id="bookingsChart"></canvas>
      </div>
    </div>
    {{-- Bar Chart --}}
    <div class="glass rounded-2xl p-6">
      <h2 class="text-base font-bold text-white mb-4">Bookings — Last 7 Days</h2>
      <div class="h-56">
        <canvas id="bookingsByDateChart"></canvas>
      </div>
    </div>
  </div>


  {{-- Quick Actions --}}
  <div class="glass rounded-2xl p-5 mb-8
      flex items-center gap-4 flex-wrap">
    <span class="text-sm font-semibold text-gray-300">Quick Actions:</span>
    <a href="{{ route('book.index') }}" class="bg-amber-500 hover:bg-amber-600 text-slate-900 font-semibold text-sm px-5 py-2 rounded-lg transition-colors">
      View All Bookings
    </a>
    <a href="{{ route('book.export') }}" class="bg-slate-700 hover:bg-slate-600 text-white font-semibold text-sm px-5 py-2 rounded-lg transition-colors">
      Export to Excel
    </a>
  </div>

  {{-- Latest Bookings --}}
  <div class="glass rounded-2xl overflow-hidden">
    <div class="px-6 py-4 border-b border-white/10 flex items-center justify-between">
      <h2 class="text-base font-bold text-white">Latest Bookings</h2>
      <a href="{{ route('book.index') }}" class="text-amber-400 text-xs hover:underline">View all →</a>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full text-sm">
        <thead class="bg-slate-800/80">
          <tr>
            @foreach(['Name', 'Phone', 'Pickup', 'Dropoff', 'Status', 'Created'] as $h)
              <th class="px-5 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider">{{ $h }}</th>
            @endforeach
          </tr>
        </thead>
        <tbody class="divide-y divide-white/5">
          @forelse($latestBookings as $b)
                    <tr class="hover:bg-white/[0.03] transition-colors">
                      <td class="px-5 py-3 text-white font-medium">{{ $b->name }}</td>
                      <td cla
            s             s="px-5 py-3 text-gray-400">{{ $b->phone }}</td>
                      <td class="px-5 py-3 text-gray-400 truncate max-w-[140px]">{{ $b->pickup_location }}</td>
                      <td class="px-5 py-3 text-gray-400 truncate max-w-[140px]">{{ $b->dropoff_location }}</td>
                      <td class="px-5 py-3">
                        @php $sc = ['pending' => 'bg-amber-500/20 text-amber-400', 'confirmed' => 'bg-emerald-500/20 text-emerald-400', 'cancelled' => 'bg-red-500/20 text-red-400']; @endphp

                      <span class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $sc[$b->status] ?? 'bg-gray-700 text-gray-300' }}">{{ ucfirst($b->status) }}</span>
                      </td>
                      <td class="px-5 py-3 text-gray-500 text-xs">{{ $b->created_at->format('d M, H:i') }}</td>
                    </tr>
          @empty
            <tr><td colspan="6" class="text-center py-8 text-gray-500">No bookings yet.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  {{-- Charts JS (after Chart.js is loaded in layout head) --}}
  <script>
    // Pie chart
      new Chart(document.getElementById('bookingsChart').getContext('2d'), {
      type: 'doughnut',
             data: {
        labels: @json($chartData['labels']),
        datasets: [{ data: @json($chartData['values']), backgroundColor: ['#f59e0b','#10b981','#ef4444'], borderWidth: 0, hoverOffset: 6 }]
      },
      options: { responsive: true, cutout: '65%', plugins: { legend: { position:'bottom', labels:{ color:'#94a3b8', font:{size:12} } } } }
    });
    // Bar chart
        new Chart(document.getElementById('bookingsByDateChart').getContext('2d'), {
      type: 'bar',
      data: {
        labels: @json($chartByDate['labels']),
        datasets: [{ label:'Bookings', data: @json($chartByDate['values']), backgroundColor:'#f59e0b', borderRadius:6, borderWidth:0 }]
      },
        options: {
              responsive: true, maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
          x: { grid: { color:'rgba(255,255,255,0.05)' }, ticks: { color:'#64748b' } },
          y: { beginAtZero:true, ticks:{ stepSize:1, color:'#64748b' }, grid:{ color:'rgba(255,255,255,0.05)' } }
        }
      }
    });
  </script>

@endsection
