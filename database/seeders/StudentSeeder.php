<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::query()->create([
            'first_name' => "Jaloladdin",
            'last_name' => "Ro'zmetov",
            'age' => 23,
            'phone_number' => "23344334",
            'group_id' => 1
        ]);
        Student::query()->create([
            'first_name' => "O'ktam",
            'last_name' => "Temurov",
            'age' => 23,
            'phone_number' => "2343434",
            'group_id' => rand(1,8)
        ]);
        Student::query()->create([
            'first_name' => "Akmal",
            'last_name' => "Abbasov",
            'age' => 23,
            'phone_number' => "343434",
            'group_id' => rand(1,8)
        ]);
        Student::query()->create([
            'first_name' => "Komila",
            'last_name' => "Qilicheva",
            'age' => "26",
            'phone_number' => "34535534",
            'group_id' => rand(1,8)
        ]);
        Student::query()->create([
            'first_name' => "Shahlo",
            'last_name' => "Rustamova",
            'age' => "21",
            'phone_number' => "",
            'group_id' => rand(1,8)
        ]);
        Student::query()->create([
            'first_name' => "Bahodir",
            'last_name' => "O'ktamov",
            'age' => "30",
            'phone_number' => "34345353",
            'group_id' => rand(1,8)
        ]);
        Student::query()->create([
            'first_name' => "Boltovoy",
            'last_name' => "Teshavoyov",
            'age' => "32",
            'phone_number' => "343535",
            'group_id' => rand(1,8)
        ]);
        Student::query()->create([
            'first_name' => "Shoxrux",
            'last_name' => "Alimboyev",
            'age' => "22",
            'phone_number' => "3435354",
            'group_id' => rand(1,8)
        ]);
        Student::query()->create([
            'first_name' => "Munisa",
            'last_name' => "Bahadirova",
            'age' => "20",
            'phone_number' => "343534223",
            'group_id' => rand(1,8)
        ]);
        Student::query()->create([
            'first_name' => "Shahnoza",
            'last_name' => "Allanazarova",
            'age' => "18",
            'phone_number' => "243535",
            'group_id' => rand(1,8)
        ]);
        Student::query()->create([
            'first_name' => "Qahramon",
            'last_name' => "Eshmetov",
            'age' => "19",
            'phone_number' => "2423224",
            'group_id' => rand(1,8)
        ]);
        Student::query()->create([
            'first_name' => "Bobur",
            'last_name' => "Ro'zmetov",
            'age' => "17",
            'phone_number' => "243454434",
            'group_id' => rand(1,8)
        ]);
        Student::query()->create([
            'first_name' => "Asadbek",
            'last_name' => "Qalandarov",
            'age' => "22",
            'phone_number' => "3423257576",
            'group_id' => rand(1,8)
        ]);
    }
}
