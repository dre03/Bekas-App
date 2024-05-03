<?php

namespace Database\Seeders;

use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $offers = [
            [
                'user_id' => random_int(1,10),
                'product_id' => random_int(1,7),
                'price' => 1900000,
            ],
            [
                'user_id' => random_int(1,10),
                'product_id' => random_int(1,7),
                'price' => 2900000,
            ],
            [
                'user_id' => random_int(1,10),
                'product_id' => random_int(1,7),
                'price' => 3900000,
            ],
            [
                'user_id' => random_int(1,10),
                'product_id' => random_int(1,7),
                'price' => 4900000,
            ],
            [
                'user_id' => random_int(1,10),
                'product_id' => random_int(1,7),
                'price' => 5900000,
            ],
            [
                'user_id' => random_int(1,10),
                'product_id' => random_int(1,7),
                'price' => 200000,
            ],
            [
                'user_id' => random_int(1,10),
                'product_id' => random_int(1,7),
                'price' => 100000,
            ],
        ];

        foreach ($offers as $key => $val) {
            Offer::create($val);
        }
    }
}
