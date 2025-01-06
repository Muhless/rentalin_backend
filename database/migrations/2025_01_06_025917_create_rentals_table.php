<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('car_id')
                ->constrained('cars')
                ->onDelete('cascade');
            $table->date('rent_date');
            $table->date('return_date');
            $table->integer('rent_duration');
            $table->string('payment');  // Payment method (could be 'Credit Card', 'Cash', etc.)
            $table->integer('total');  // Total rental cost
            $table->timestamps();  // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
