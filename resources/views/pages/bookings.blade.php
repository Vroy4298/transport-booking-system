@extends('layouts.admin')

@section('page_title', 'Manage Bookings')

@section('content')

    {{-- Success --}}
    @if (session('success'))
        <div
            class="mb-5 p-4 bg-emerald-500/15 border border-emerald-500/30 text-emerald-300 rounded-xl flex items-center gap-3 text-sm">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Filters --}}
    <form method="GET" action="{{ route('book.index') }}" class="glass rounded-2xl p-5 mb-6">
        <div class="flex flex-wrap gap-3 items-end">
            <div class="flex-1 min-w-[180px]">
                <label class="block text-xs font-semibold text-gray-400 mb-1 uppercase tracking-widest">Search</label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Name or phone..."
                    class="w-full bg-slate-700/60 border border-white/10 text-white placeholder-gray-500 px-4 py-2.5 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-400 mb-1 uppercase tracking-widest">Status</label>
                <select name="status"
                    class="bg-slate-700/60 border border-white/10 text-white px-4 py-2.5 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
                    <option value="">All Statuses</option>
                    @foreach(['pending', 'confirmed', 'cancelled'] as $s)
                        <option value="{{ $s }}" {{ request('status') === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-400 mb-1 uppercase tracking-widest">From</label>
                <input type="date" name="from_date" value="{{ request('from_date') }}"
                    class="bg-slate-700/60 border border-white/10 text-white px-4 py-2.5 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
            </div>
            <div>
                <label class="block text-xs font-semibold text-gray-400 mb-1 uppercase tracking-widest">To</label>
                <input type="date" name="to_date" value="{{ request('to_date') }}"
                    class="bg-slate-700/60 border border-white/10 text-white px-4 py-2.5 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-amber-500 transition">
            </div>
            <div class="flex gap-2">
                <button type="submit"
                    class="bg-amber-500 hover:bg-amber-600 text-slate-900 font-semibold px-5 py-2.5 rounded-xl text-sm transition-colors">Filter</button>
                <a href="{{ route('book.index') }}"
                    class="bg-slate-700 hover:bg-slate-600 text-white font-semibold px-4 py-2.5 rounded-xl text-sm transition-colors">Reset</a>
            </div>
            <div class="ml-auto">
                <a href="{{ route('book.export', request()->query()) }}"
                    class="bg-emerald-600 hover:bg-emerald-700 text-white font-semibold px-5 py-2.5 rounded-xl text-sm transition-colors inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                    </svg>
                    Export
                </a>
            </div>
        </div>
    </form>

    {{-- Table --}}
    <div class="glass rounded-2xl overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-800/80">
                    <tr>
                        @foreach(['#', 'Customer', 'Phone', 'Route', 'Date / Time', 'Vehicle', 'Status', 'Actions'] as $h)
                            <th
                                class="px-4 py-3 text-left text-xs font-semibold text-gray-400 uppercase tracking-wider whitespace-nowrap">
                                {{ $h }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody class="divide-y divide-white/5">
                    @forelse($bookings as $b)
                        <tr class="hover:bg-white/[0.03] transition-colors">
                            <td class="px-4 py-3 text-gray-500 text-xs">{{ $b->id }}</td>
                            <td class="px-4 py-3">
                                <div class="text-white font-medium">{{ $b->name }}</div>
                                <div class="text-gray-500 text-xs">{{ $b->email }}</div>
                            </td>
                            <td class="px-4 py-3 text-gray-400 whitespace-nowrap">{{ $b->phone }}</td>
                            <td class="px-4 py-3">
                                <div class="text-gray-300 text-xs">{{ $b->pickup_location }}</div>
                                <div class="text-gray-500 text-xs flex items-center gap-1">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 9l-7 7-7-7" />
                                    </svg>
                                    {{ $b->dropoff_location }}
                                </div>
                            </td>
                            <td class="px-4 py-3 text-gray-400 whitespace-nowrap text-xs">
                                <div>{{ $b->pickup_date }}</div>
                                <div class="text-gray-500">{{ $b->pickup_time }}</div>
                            </td>
                            <td class="px-4 py-3 text-gray-400 text-xs">{{ $b->vehicle_type ?: '—' }}</td>
                            <td class="px-4 py-3">
                                @php $sc = ['pending' => 'bg-amber-500/20 text-amber-400', 'confirmed' => 'bg-emerald-500/20 text-emerald-400', 'cancelled' => 'bg-red-500/20 text-red-400']; @endphp
                                <span
                                    class="px-2.5 py-1 text-xs font-semibold rounded-full {{ $sc[$b->status] ?? 'bg-gray-700 text-gray-300' }}">{{ ucfirst($b->status) }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <form action="{{ route('book.updateStatus', $b->id) }}" method="POST" class="inline">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="confirmed">
                                        <button type="submit" title="Confirm"
                                            class="w-7 h-7 bg-emerald-500/20 hover:bg-emerald-500/40 text-emerald-400 rounded-lg flex items-center justify-center transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M5 13l4 4L19 7" />
                                            </svg>
                                        </button>
                                    </form>
                                    <form action="{{ route('book.updateStatus', $b->id) }}" method="POST" class="inline">
                                        @csrf @method('PATCH')
                                        <input type="hidden" name="status" value="cancelled">
                                        <button type="submit" title="Cancel"
                                            class="w-7 h-7 bg-red-500/20 hover:bg-red-500/40 text-red-400 rounded-lg flex items-center justify-center transition-colors">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M6 18L18 6M6 6l12 12" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-12 text-gray-500">No bookings found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if($bookings->hasPages())
            <div class="px-5 py-4 border-t border-white/10">
                {{ $bookings->appends(request()->query())->links() }}
            </div>
        @endif
    </div>

@endsection