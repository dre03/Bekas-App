<?php

namespace Database\Seeders;

use App\Models\Categorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Motor'
            ], [
                'name' => 'Mobil'
            ], [
                'name' => 'Elektronik & Gedget'
            ], [
                'name' => 'Properti'
            ], [
                'name' => 'Olahraga & Hobi'
            ], [
                'name' => 'Perlengkapan Bayi & Anak'
            ], [
                'name' => 'Peralatan Rumah'
            ]
        ];

        foreach ($categories as $key => $val) {
            Categorie::create($val);
        }
    }
}
