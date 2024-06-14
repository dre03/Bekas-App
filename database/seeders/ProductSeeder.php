<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $products = [
            [
                'name' => 'Honda Beat',
                'brand' => 'Honda',
                'production_year' => 2020,
                'type' => 'Injec',
                'color' => 'Hitam',
                'condition' => 'Bekas',
                'price' => 1000000,
                'description' => 'Jual Motor Honda bekas masih mulus jangan ragu',
                'user_id' => random_int(2, 7),
                'sub_categorie_id' => 2,
                'village_id' => fake()->numberBetween(1, 83761),
                'status_id' => 1,
            ], [
                'name' => 'iPhone 13 Pro',
                'brand' => 'Apple',
                'production_year' => 2021,
                'type' => 'Smartphone',
                'color' => 'Graphite',
                'condition' => 'Baru',
                'price' => 12990000,
                'description' => 'iPhone 13 Pro dengan layar Super Retina XDR, chip A15 Bionic, dan sistem kamera Pro.',
                'user_id' => random_int(2, 7),
                'sub_categorie_id' => 4,
                'village_id' => fake()->numberBetween(1,83761),
                'status_id' => 1,
            ],
            [
                'name' => 'Toyota Camry Hybrid',
                'brand' => 'Toyota',
                'production_year' => 2022,
                'type' => 'Sedan',
                'color' => 'Silver Metallic',
                'condition' => 'Baru',
                'price' => 550000000,
                'description' => 'Toyota Camry Hybrid dengan teknologi hibrida, elegan dan hemat bahan bakar.',
                'user_id' => random_int(2, 7),
                'sub_categorie_id' => 1,
                'village_id' => fake()->numberBetween(1,83761),
                'status_id' => 1,
            ],
            [
                'name' => 'Apartemen Taman Anggrek Residence',
                'brand' => 'Taman Anggrek Residence',
                'production_year' => 2010,
                'type' => 'Apartemen',
                'color' => "Putih",
                'condition' => 'Baru',
                'price' => 800000000,
                'description' => 'Apartemen mewah dengan fasilitas lengkap, lokasi strategis di tengah kota.',
                'user_id' => random_int(2, 7),
                'sub_categorie_id' => 6,
                'village_id' => fake()->numberBetween(1,83761),
                'status_id' => 1,
            ],
            [
                'name' => 'Samsung 55" QLED 4K Smart TV',
                'brand' => 'Samsung',
                'production_year' => 2022,
                'type' => 'Smart TV',
                'color' => 'Black',
                'condition' => 'Baru',
                'price' => 8500000,
                'description' => 'TV pintar Samsung dengan teknologi QLED, resolusi 4K, dan fitur pintar terbaru.',
                'user_id' => random_int(2, 7),
                'sub_categorie_id' => 3,
                'village_id' => fake()->numberBetween(1,83761),
                'status_id' => 1,
            ],
            [
                'name' => 'Toyota Fortuner VRZ',
                'brand' => 'Toyota',
                'production_year' => 2023,
                'type' => 'SUV',
                'color' => 'White Pearl',
                'condition' => 'Bekas',
                'price' => 550000000,
                'description' => 'Toyota Fortuner VRZ dengan desain kokoh dan fitur lengkap, siap untuk petualangan.',
                'user_id' => random_int(2, 7),
                'sub_categorie_id' => 2,
                'village_id' => fake()->numberBetween(1,83761),
                'status_id' => 1,
            ],
            [
                'name' => 'Rumah Modern Minimalis',
                'brand' => "",
                'production_year' => 2011,
                'type' => 'Rumah',
                'color' => 'Putih',
                'condition' => 'Baru',
                'price' => 1200000000,
                'description' => 'Rumah modern dengan desain minimalis, ruangan luas, dan fasilitas modern.',
                'user_id' => random_int(2, 7),
                'sub_categorie_id' => 5,
                'village_id' => fake()->numberBetween(1,83761),
                'status_id' => 1,
            ],
        ];

        foreach ($products as $key => $val) {
            Product::create($val);
        }
    }
}
