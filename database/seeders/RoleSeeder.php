<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            [
                'name' => 'admin'
            ], [
                'name' => 'customer'
            ]
        ];

        foreach ($role as $key => $val) {
            Role::create($val);
        }
    }
}
