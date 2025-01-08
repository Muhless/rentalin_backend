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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('rental_id')
                ->constrained('rentals');
            $table->date('actual_return_date')->nullable();
            $table->integer('late_days')->default(0);
            $table->integer('penalty_fee')->default(0);
            $table->integer('total');
            $table->string('status')->default('Sedang Berlangsung');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
