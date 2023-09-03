<?php

namespace Database\Seeders;
use App\Models\role;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        role::create([
            'name' => 'admin',
        ]);
        role::create([
            'name' => 'chef de projet',
        ]);
        role::create([
            'name' => 'maintainer',
        ]);
        role::create([
            'name' => 'developpeur',
        ]);
        role::create([
            'name' => 'guest',
        ]);
    }
}
