<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Andre Apriyana',
                'username' => 'andre',
                'password' => 'andre123',
                'email' => 'andre@email.com',
                'phone_number' => '08745728375',             
                'gender' => 'Laki-Laki',
                'address' => 'Bogor, Jawa Barat',
                'role_id' => 1,
            ], [
                'name' => 'Rina Wijaya',
                'username' => 'rina',
                'password' => 'rina123',
                'email' => 'rina@email.com',
                'phone_number' => '08745728376',
                'gender' => 'Perempuan',
                'address' => 'Jakarta Pusat, DKI Jakarta',
                'role_id' => 1,
            ], [
                'name' => 'Udin',
                'username' => 'udin',
                'password' => 'udin123',
                'email' => 'udin@email.com',
                'phone_number' => '08745728375',           
                'gender' => 'Laki-Laki',
                'address' => 'Bogor, Jawa Barat',
                'role_id' => 2,
            ], 
            [
                'name' => 'Budi Santoso',
                'username' => 'budi',
                'password' => 'budi123',
                'email' => 'budi@email.com',
                'phone_number' => '08745728377',
                'gender' => 'Laki-Laki',
                'address' => 'Surabaya, Jawa Timur',
                'role_id' => 2,
            ],
            [
                'name' => 'Siti Rahmawati',
                'username' => 'siti',
                'password' => 'siti123',
                'email' => 'siti@email.com',
                'phone_number' => '08745728378',
                'gender' => 'Perempuan',
                'address' => 'Bandung, Jawa Barat',
                'role_id' => 2,
            ],
            [
                'name' => 'Joko Susilo',
                'username' => 'joko',
                'password' => 'joko123',
                'email' => 'joko@email.com',
                'phone_number' => '08745728379',
                'gender' => 'Laki-Laki',
                'address' => 'Semarang, Jawa Tengah',
                'role_id' => 2,
            ],
            [
                'name' => 'Dewi Lestari',
                'username' => 'dewi',
                'password' => 'dewi123',
                'email' => 'dewi@email.com',
                'phone_number' => '08745728380',
                'gender' => 'Perempuan',
                'address' => 'Yogyakarta, DI Yogyakarta',
                'role_id' => 2,
            ],
            [
                'name' => 'Agus Setiawan',
                'username' => 'agus',
                'password' => 'agus123',
                'email' => 'agus@email.com',
                'phone_number' => '08745728381',
                'gender' => 'Laki-Laki',
                'address' => 'Bandung, Jawa Barat',
                'role_id' => 2,
            ],
            [
                'name' => 'Siska Fitriani',
                'username' => 'siska',
                'password' => 'siska123',
                'email' => 'siska@email.com',
                'phone_number' => '08745728382',
                'gender' => 'Perempuan',
                'address' => 'Surabaya, Jawa Timur',
                'role_id' => 2,
            ],
            [
                'name' => 'Rudi Hermawan',
                'username' => 'rudi',
                'password' => 'rudi123',
                'email' => 'rudi@email.com',
                'phone_number' => '08745728383',
                'gender' => 'Laki-Laki',
                'address' => 'Semarang, Jawa Tengah',
                'role_id' => 2,
            ],
            [
                'name' => 'Lina Sari',
                'username' => 'lina',
                'password' => 'lina123',
                'email' => 'lina@email.com',
                'phone_number' => '08745728384',
                'gender' => 'Perempuan',
                'address' => 'Yogyakarta, DI Yogyakarta',
                'role_id' => 2,
            ],
            [
                'name' => 'Eko Prabowo',
                'username' => 'eko',
                'password' => 'eko123',
                'email' => 'eko@email.com',
                'phone_number' => '08745728385',
                'gender' => 'Laki-Laki',
                'address' => 'Jakarta Pusat, DKI Jakarta',
                'role_id' => 2,
            ],
        ];

        foreach ($users as $key => $val) {
            User::create($val);
        }
    }
}
