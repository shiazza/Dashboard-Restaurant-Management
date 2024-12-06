<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Makanan Pembuka'],
            ['name' => 'Makanan Utama'],
            ['name' => 'Minuman'],
            ['name' => 'Pencuci Mulut'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}

