<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // User::create([
        //     'name' => 'John Doe',
        //     'email' => 'johndoe@example.com',
        //     'password' => bcrypt('password'),
        // ]);

        User::create([
            'name' => 'Bouchra Benghazala',
            'email' => 'bouchrabenghazala@gmail.com',
            'password' => bcrypt('stage2023'),
        ]);
    }
}
