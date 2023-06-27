<?php

namespace Database\Seeders;

use App\Models\Cars;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cars::create([
            'type' => 'SUV',
            'merk' => 'Honda',
            'cc' => '1500',
            'price' => '200000000',
        ]);
    }
}
