<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'user_id' => random_int(1, 10),
                'categorie_id' => random_int(1, 7),
                'image_id' => random_int(1, 10),
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
                'user_id' => random_int(1, 10),
                'categorie_id' => random_int(1, 7),
                'image_id' => random_int(1, 10),
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
                'user_id' => random_int(1, 10),
                'categorie_id' => random_int(1, 7),
                'image_id' => random_int(1, 10),
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
                'user_id' => random_int(1, 10),
                'categorie_id' => random_int(1, 7),
                'image_id' => random_int(1, 10),
                'status_id' => 1,
            ],
            [
                'name' => 'Adidas Ultraboost 21 Running Shoes',
                'brand' => 'Adidas',
                'production_year' => 2021,
                'type' => 'Sepatu Lari',
                'color' => 'Core Black / Solar Red',
                'condition' => 'Baru',
                'price' => 1899000,
                'description' => 'Sepatu lari dengan teknologi Boost untuk kenyamanan maksimal dan performa lari yang unggul.',
                'user_id' => random_int(1, 10),
                'categorie_id' => random_int(1, 7),
                'image_id' => random_int(1, 10),
                'status_id' => 2,
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
                'user_id' => random_int(1, 10),
                'categorie_id' => random_int(1, 7),
                'image_id' => random_int(1, 10),
                'status_id' => 2,
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
                'user_id' => random_int(1, 10),
                'categorie_id' => random_int(1, 7),
                'image_id' => random_int(1, 10),
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
                'user_id' => random_int(1, 10),
                'categorie_id' => random_int(1, 7),
                'image_id' => random_int(1, 10),
                'status_id' => 2,
            ],
            [
                'name' => 'Nike Air Zoom Pegasus 38 Running Shoes',
                'brand' => 'Nike',
                'production_year' => 2022,
                'type' => 'Sepatu Lari',
                'color' => 'White / Black / Pure Platinum',
                'condition' => 'Baru',
                'price' => 1499000,
                'description' => 'Sepatu lari dengan teknologi Air Zoom untuk responsivitas dan kenyamanan luar biasa.',
                'user_id' => random_int(1, 10),
                'categorie_id' => random_int(1, 7),
                'image_id' => random_int(1, 10),
                'status_id' => 1,
            ],
        ];

        foreach ($products as $key => $val) {
            Product::create($val);
        }
    }
}
