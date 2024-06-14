<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Loop through each product
        for ($i = 1; $i <= 20; $i++) {
            // Assuming you have URLs of product images stored in an array
            $imageUrls = [
                'https://cdn.pixabay.com/photo/2012/05/29/00/43/car-49278_640.jpg',
                'https://i.pinimg.com/736x/d3/02/83/d302837aa8952c24b107aeb65d1121f2.jpg',
                'https://images-cdn.ubuy.co.in/653848d16c6ebf2645098aa5-hp-2023-15-6-inch-hd-laptop-11th.jpg',
                'https://s3.bukalapak.com/img/36865043992/s-463-463/data.jpg',
                'https://cdn.pixabay.com/photo/2017/07/08/02/16/house-2483336_1280.jpg',
                'https://picsum.photos/200'
            ];
            // Select a random image URL
            $imageUrl = $imageUrls[array_rand($imageUrls)];
            // Download the image and store it locally
            $imageName = 'product_' . $i . '.jpg'; // Rename the image as needed
            $imagePath = '/storage/product/' . $imageName; // Define the storage path
            $imageContents = file_get_contents($imageUrl); // Get the image contents
            Storage::put($imagePath, $imageContents); // Store the image locally

            // Create a record in the images table
            Image::create([
                'path' => $imagePath, // Store the path to the image
                'product_id' => random_int(1,7), // Assuming product IDs start from 1 and increment by 1
            ]);
        }
    }
}
