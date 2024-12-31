<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onDelete('cascade');
            $table->foreignId('car_id')
                ->constrained('cars')
                ->onDelete('cascade');
            $table->date('rent_date');
            $table->date('return_date');
            $table->string('rent_duration');
            $table->foreignId('payment_id')
                ->constrained('payments')
                ->onDelete('cascade');
            $table->integer('total');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
