<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

  protected $fillable = [
    'name','email','phone','pickup_location','dropoff_location',
    'pickup_date','pickup_time','vehicle_type','notes','status',
];

}
