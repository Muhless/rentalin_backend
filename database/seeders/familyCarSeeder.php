<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class familyCarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('family')->insert([
            'nama_mobil' => 'Honda Brio',
            'harga' => 150000,
            'transmisi' => 'Manual'
        ]);
    }
}
