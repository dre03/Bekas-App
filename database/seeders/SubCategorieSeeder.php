<?php

namespace Database\Seeders;

use App\Models\SubCategorie;
use Illuminate\Database\Seeder;

class SubCategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subcategories = [
            [
                'categorie_id' => 1,
                'name' => 'Mobil',
            ],
            [
                'categorie_id' => 1,
                'name' => 'Motor',
            ],
            [
                'categorie_id' => 2,
                'name' => 'Laptop',
            ],
            [
                'categorie_id' => 2,
                'name' => 'Handphone',
            ],
            [
                'categorie_id' => 3,
                'name' => 'Rumah',
            ],
            [
                'categorie_id' => 3,
                'name' => 'Apartemen',
            ],
            [
                'categorie_id' => 4,
                'name' => 'Gitar',
            ],
            [
                'categorie_id' => 5,
                'name' => 'Meja Makan',
            ],
        ];

        foreach ($subcategories as $key => $val) {
            SubCategorie::create($val);
        }
    }
}
