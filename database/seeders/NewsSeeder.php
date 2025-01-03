<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    public function run()
    {
        DB::table('news')->insert([
            [
                'title' => 'AI Revolution in Tech Industry',
                'content' => 'Artificial Intelligence is reshaping the world.',
                'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Health Benefits of Regular Exercise',
                'content' => 'Exercise improves mental and physical health.',
                'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Online Learning in the Digital Age',
                'content' => 'Education is moving towards digital platforms.',
                'category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
