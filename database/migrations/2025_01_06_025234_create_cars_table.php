<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('category');
            $table->string('brand');
            $table->string('model');
            $table->string('image_url')->nullable();
            $table->integer('price');
            $table->string('status');
            $table->string('capacity')->nullable();
            $table->string('transmission')->nullable();
            $table->string('luggage_capacity')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('fuel_consumption')->nullable();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
