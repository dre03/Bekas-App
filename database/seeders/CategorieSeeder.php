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
                'name' => 'Kendaraan',
                'image' => 'https://source.unsplash.com/random'
            ], [
                'name' => 'Elektronik & Gedget',
                'image' => 'https://source.unsplash.com/random'
            ], [
                'name' => 'Properti',
                'image' => 'https://source.unsplash.com/random'
            ], [
                'name' => 'Olahraga & Hobi',
                'image' => 'https://source.unsplash.com/random'
            ], [
                'name' => 'Perlengkapan Bayi & Anak',
                'image' => 'https://source.unsplash.com/random'
            ], [
                'name' => 'Peralatan Rumah',
                'image' => 'https://source.unsplash.com/random'
            ],
        ];

        foreach ($categories as $key => $val) {
            Categorie::create($val);
        }
    }
}
