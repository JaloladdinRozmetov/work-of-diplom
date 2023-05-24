<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(EvaluationSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(TopicSeeder::class);
        $this->call(GroupSeeder::class);
        $this->call(UserSeeder::class);
    }
}
