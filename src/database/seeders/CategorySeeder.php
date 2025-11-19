<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $category_names = [
            'トップス',
            'ボトムス',
            'アウター',
            'シューズ',
        ];

        foreach ($category_names as $category_name) {
            Category::firstOrCreate([
                'name' => $category_name,
            ]);
        }
    }
}
