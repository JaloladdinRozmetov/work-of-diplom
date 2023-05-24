<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Group::query()->create([
            'name' => "944-19"
        ]);
        Group::query()->create([
            'name' => "943-19"
        ]);
        Group::query()->create([
            'name' => "942-19"
        ]);
        Group::query()->create([
            'name' => "941-19"
        ]);
        Group::query()->create([
            'name' => "913-19"
        ]);
        Group::query()->create([
            'name' => "922-19"
        ]);
        Group::query()->create([
            'name' => "933-19"
        ]);
        Group::query()->create([
            'name' => "951-19"
        ]);
    }
}
