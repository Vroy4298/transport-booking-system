<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    Schema::create('bookings', function (Illuminate\Database\Schema\Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('phone', 20);
        $table->string('pickup_location');
        $table->string('dropoff_location');
        $table->date('pickup_date');
        $table->time('pickup_time');
        $table->string('vehicle_type')->nullable();
        $table->text('notes')->nullable();
        $table->string('status')->default('pending'); // pending | confirmed | cancelled
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
