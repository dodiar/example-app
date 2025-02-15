<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class NewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       for ($i = 0; $i < 10; $i++)
       {
            DB::table('news')->insert([
                'title' => fake()->sentence(6),
                'body' => fake()->text(200)
            ]);
       }
    }
}
