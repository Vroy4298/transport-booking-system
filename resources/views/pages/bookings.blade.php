@extends('layouts.admin')


@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">

    <h1 class="text-2xl font-bold mb-6">Manage Bookings</h1>

    <!-- ✅ Success Message -->
    @if (session('success'))
        <div class="mb-4 p-4 bg-green-100 border border-green-300 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- 🔍 Filter Form -->
    <form method="GET" action="{{ route('book.index') }}" 
          class="flex flex-wrap items-center gap-3 mb-6 bg-white shadow p-4 rounded">
        <input type="text" name="search" placeholder="Search by name or phone"
               value="{{ request('search') }}"
               class="px-3 py-2 border rounded w-48">

        <select name="status" class="px-3 py-2 border rounded">
            <option value="">All Statuses</option>
            <option value="pending"   {{ request('status')==='pending' ? 'selected' : '' }}>Pending</option>
            <option value="confirmed" {{ request('status')==='confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="cancelled" {{ request('status')==='cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>

        <input type="date" name="from_date" value="{{ request('from_date') }}"
               class="px-3 py-2 border rounded">
        <input type="date" name="to_date" value="{{ request('to_date') }}"
               class="px-3 py-2 border rounded">

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded">
            Filter
        </button>
        <a href="{{ route('book.index') }}" 
           class="px-4 py-2 bg-gray-400 text-white rounded">
            Reset
        </a>

        <!-- 📤 Export Button -->
        <a href="{{ route('book.export', request()->query()) }}" 
           class="px-4 py-2 bg-green-600 text-white rounded ml-auto">
            Export Excel
        </a>
    </form>

    <!-- 📋 Bookings Table -->
    <div class="overflow-x-auto bg-white shadow rounded-lg">
        <table class="w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">ID</th>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Phone</th>
                    <th class="p-3 text-left">From → To</th>
                    <th class="p-3 text-left">Date</th>
                    <th class="p-3 text-left">Time</th>
                    <th class="p-3 text-left">Vehicle</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Created</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($bookings as $b)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3">{{ $b->id }}</td>
                        <td class="p-3">{{ $b->name }}</td>
                        <td class="p-3">{{ $b->phone }}</td>
                        <td class="p-3">{{ $b->pickup_location }} → {{ $b->dropoff_location }}</td>
                        <td class="p-3">{{ $b->pickup_date }}</td>
                        <td class="p-3">{{ $b->pickup_time }}</td>
                        <td class="p-3">{{ $b->vehicle_type }}</td>
                        <td class="p-3">
                            @php
                                $colors = [
                                    'pending' => 'bg-yellow-100 text-yellow-700',
                                    'confirmed' => 'bg-green-100 text-green-700',
                                    'cancelled' => 'bg-red-100 text-red-700',
                                ];
                            @endphp
                            <span class="px-2 py-1 text-xs font-semibold rounded {{ $colors[$b->status] ?? 'bg-gray-100 text-gray-600' }}">
                                {{ ucfirst($b->status) }}
                            </span>
                        </td>
                        <td class="p-3">{{ $b->created_at->format('Y-m-d H:i') }}</td>
                        <td class="p-3 space-x-1">
                            <form action="{{ route('book.updateStatus', $b->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="confirmed">
                                <button type="submit" 
                                        class="px-2 py-1 bg-green-600 text-white text-xs rounded">
                                    Confirm
                                </button>
                            </form>
                            <form action="{{ route('book.updateStatus', $b->id) }}" method="POST" class="inline">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="status" value="cancelled">
                                <button type="submit" 
                                        class="px-2 py-1 bg-red-600 text-white text-xs rounded">
                                    Cancel
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10" class="text-center py-4 text-gray-500">No bookings yet.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- 📄 Pagination -->
    <div class="mt-6 flex justify-center">
        {{ $bookings->appends(request()->query())->links() }}
    </div>
</div>
@endsection
