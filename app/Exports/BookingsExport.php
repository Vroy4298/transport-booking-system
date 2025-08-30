<?php

namespace App\Exports;

use App\Models\Booking;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BookingsExport implements FromCollection, WithHeadings
{
    protected $filters;

    public function __construct($filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        $query = Booking::query();

        // 🔍 search by name or phone
        if (!empty($this->filters['search'])) {
            $search = $this->filters['search'];
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // 🎛 filter by status
        if (!empty($this->filters['status'])) {
            $query->where('status', $this->filters['status']);
        }

        // 📅 filter by date range
        if (!empty($this->filters['from_date'])) {
            $query->whereDate('pickup_date', '>=', $this->filters['from_date']);
        }
        if (!empty($this->filters['to_date'])) {
            $query->whereDate('pickup_date', '<=', $this->filters['to_date']);
        }

        return $query->latest()->get([
            'id','name','email','phone','pickup_location',
            'dropoff_location','pickup_date','pickup_time',
            'vehicle_type','status','created_at'
        ]);
    }

    public function headings(): array
    {
        return [
            'ID','Name','Email','Phone','Pickup Location','Drop-off Location',
            'Pickup Date','Pickup Time','Vehicle Type','Status','Created At'
        ];
    }
}
