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
                ->constrained('users');
            $table->foreignId('car_id')
                ->constrained('cars');
            $table->date('rent_date');
            $table->date('return_date');
            $table->integer('rent_duration');
            $table->string('driver')->default('tidak');
            $table->integer('total');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
