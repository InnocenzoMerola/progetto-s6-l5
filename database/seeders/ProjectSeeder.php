<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('projects')->insert([
            'name' => 'Netflix',
            'languages' => 'React, Css, Php',
            'description' => 'Netflix MokUp',
            'image' => 'https://i.ibb.co/0Y4JZ1d/netflix.png',
            'year' => "2024-04-22",
        ]);

        for ($i=0; $i < 4; $i++) {
            DB::table('projects')->insert([
                'name' => fake()->words(rand(1, 3), true),
                'languages' => 'React, Css, Php',
                'description' => fake()->paragraph(2, 5),
                'image' => fake()->imageUrl(640, 480),
                'year' => "2024-03-25",
            ]);
        }
    }
}
