<?php

namespace Database\Seeders;

use App\Models\Image;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [];
        for ($i = 1; $i <= 10; $i++) {
            $images[] = [
                'name' => 'image' . $i . '.jpg'
            ];
        }


        foreach ($images as $key => $val) {
            Image::create($val);
        }
    }
}
