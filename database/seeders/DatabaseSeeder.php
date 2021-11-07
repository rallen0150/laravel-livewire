<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Task;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(50)->create();
        Task::factory(1000)->create();
    }
}
