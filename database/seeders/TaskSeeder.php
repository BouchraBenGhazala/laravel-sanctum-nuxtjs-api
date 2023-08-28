<?php

namespace Database\Seeders;

use App\Models\task;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Task::create([
            'title' => 'Task 1',
            'description' => 'Description for Task 1',
            'priority' => 'High',
            'type' => 'Feature',
            'due_date' => '2023-08-31',
        ]);
    }
}
