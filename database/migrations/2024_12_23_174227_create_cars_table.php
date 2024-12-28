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
            $table->text('image_url');
            $table->string('capacity');
            $table->string('transmission');
            $table->string('lunggage_capacity');
            $table->string('features');
            $table->string('fuel_type');
            $table->string('fuel_consumption');
            $table->bigInteger('price');
            $table->string('status');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
