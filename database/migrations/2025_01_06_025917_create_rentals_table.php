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
            $table->string('driver')->default('tidak');
            $table->integer('total');
            $table->date('actual_return_date')->nullable();
            $table->integer('late_days')->default(0)->nullable();
            $table->integer('penalty_fee')->default(0)->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
