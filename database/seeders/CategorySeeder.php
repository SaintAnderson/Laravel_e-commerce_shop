<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        //todo
        $categories = [
            [
                'input' => [
                    'name' => 'Электроника',
                    'is_active' => true,
                    'order' => 0,
                    'is_pinned' => true,
                    'image_url' => null,
                    'parent_id' => null,
                ],
                'subcategories' => [
                    [
                        'name' => 'Телефоны',
                        'is_active' => true,
                        'order' => 0,
                        'is_pinned' => false,
                        'image_url' => null,
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Ноутбуки',
                        'is_active' => true,
                        'order' => 1,
                        'is_pinned' => false,
                        'image_url' => null,
                        'parent_id' => null,
                    ],
                ]
            ]
        ];
        foreach ($categories as $category) {
            $createdCategory = Category::create($category['input']);
            foreach ($category['subcategories'] as $subcategory) {
                $input = array_merge($subcategory, ['parent_id' => $createdCategory->id]);
                Category::create($input);
            }
        }
    }
}
