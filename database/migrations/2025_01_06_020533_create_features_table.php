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
        Schema::create('features', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('capacity')->nullable();  // Capacity of the car
            $table->string('transmission')->nullable();  // Transmission type
            $table->string('luggage_capacity')->nullable();  // Luggage capacity
            $table->string('fuel_type')->nullable();  // Type of fuel (e.g., Petrol, Diesel)
            $table->string('fuel_consumption')->nullable();  // Fuel consumption (e.g., km/l)
            $table->timestamps();  // Timestamp columns for creation and updates
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('features');
    }
};
