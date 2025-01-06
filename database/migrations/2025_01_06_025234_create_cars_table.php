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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();  // Primary key untuk tabel cars
            $table->string('category');   // Kategori mobil
            $table->string('brand');      // Merek mobil
            $table->string('model');      // Model mobil
            $table->text('image_url');    // URL gambar mobil
            $table->decimal('price', 15, 2);  // Harga mobil
            $table->string('status');     // Status mobil (misalnya tersedia atau disewa)

            $table->unsignedBigInteger('feature_id')->nullable();
            $table->foreign('feature_id')
                ->references('id')
                ->on('features')
                ->onDelete('cascade');  

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
