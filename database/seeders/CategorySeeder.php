<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        //create main categories
        Category::factory()->count(5)->create();
        //create other with random parent
        Category::factory()->count(10)->create();
    }
}
