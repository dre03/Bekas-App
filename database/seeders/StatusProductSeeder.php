<?php

namespace Database\Seeders;

use App\Models\StatusProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusProducts = [
            [
                'status' => 'Dijual'
            ], [
                'status' => 'Terjual'
            ]
        ];

        foreach ($statusProducts as $key => $val) {
            StatusProduct::create($val);
        }
    }
}
