<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // Tambahkan ini untuk menggunakan fasilitas database
use App\Models\Province;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jsonFilePath = __DIR__ . '/location.json';

        // Read JSON file line by line
        $handle = fopen($jsonFilePath, 'r');

        while (($line = fgets($handle)) !== false) {
            $data = json_decode($line, true);

            if (!empty($data)) {
                $this->processData($data);
            }
        }
    }

    private function processData(array $data): void
    {
        DB::transaction(function () use ($data) {
            foreach ($data as $provinceCode => $provinceData) {
                $provinceName = $provinceData['name'];
                $province = Province::create(['name' => $provinceName]);

                foreach ($provinceData as $cityCode => $cityData) {
                    if ($cityCode !== 'name') {
                        $cityName = $cityData['name'];
                        $city = $province->cities()->create(['name' => $cityName]);

                        foreach ($cityData as $districtCode => $districtData) {
                            if ($districtCode !== 'name') {
                                $districtName = $districtData['name'];
                                $district = $city->districts()->create(['name' => $districtName]);

                                foreach ($districtData as $villageCode => $villageData) {
                                    if ($villageCode !== 'name') {
                                        $villageName = $villageData['name'];
                                        $district->villages()->create(['name' => $villageName]);
                                    }
                                }
                            }
                        }
                    }
                }
            }
        });
    }
}
