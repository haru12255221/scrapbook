<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ScrapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 15; $i++) {
            DB::table('scraps')->insert([
                'title' => fake()->sentence(3), // 3単語くらいの本のタイトルっぽい
                'url' => fake()->url(),
                'image' => fake()->imageUrl(640, 480, 'books'), // 本っぽいイメージ画像
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
