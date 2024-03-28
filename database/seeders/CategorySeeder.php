<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'input' => [
                    'name' => 'Электроника',
                    'is_active' => true,
                    'order' => 0,
                    'is_pinned' => true,
                    'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTA9xW8v4fe0OZvwebB4BqwTbULInelMqlz4K8hCYijpw&s',
                    'parent_id' => null,
                ],
                'subcategories' => [
                    [
                        'name' => 'Телефоны',
                        'is_active' => true,
                        'order' => 0,
                        'is_pinned' => false,
                        'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTbQlOGo0qh1hfI5g_CYviiIZ0ASzng_9IgeouJP32jvw&s',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Ноутбуки',
                        'is_active' => true,
                        'order' => 1,
                        'is_pinned' => false,
                        'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6w_FuPMqq91E15YZMwzBJ-tycDyYQMXJTqU5DMIpnrQ&s',
                        'parent_id' => null,
                    ],
                ]
            ],
            [
                'input' => [
                    'name' => 'Бытовая техника',
                    'is_active' => true,
                    'order' => 0,
                    'is_pinned' => true,
                    'image_url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRnvepYu7rl5RcYHW3Vb5I_k23EfRLkQARE7lz7J2-OkA&s',
                    'parent_id' => null,
                ],
                'subcategories' => [
                    [
                        'name' => 'Холодильники',
                        'is_active' => true,
                        'order' => 0,
                        'is_pinned' => false,
                        'image_url' => 'https://remontol.odessa.ua/wp-content/uploads/2020/05/unnamed-2-1.jpg',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Стиральные машинки',
                        'is_active' => true,
                        'order' => 1,
                        'is_pinned' => false,
                        'image_url' => 'https://img.global.news.samsung.com/ru/wp-content/uploads/2020/01/all-models.jpg',
                        'parent_id' => null,
                    ],
                ]
            ],
            [
                'input' => [
                    'name' => 'Аксессуары',
                    'is_active' => true,
                    'order' => 0,
                    'is_pinned' => true,
                    'image_url' => 'https://disput-pmr.ru/attachments/%D0%B4%D0%BB%D1%8F-%D1%81%D0%BC%D0%B0%D1%80%D1%82%D1%84%D0%BE%D0%BD%D0%BE%D0%B2-png.45544/',
                    'parent_id' => null,
                ],
                'subcategories' => [
                    [
                        'name' => 'Чехлы для телефона',
                        'is_active' => true,
                        'order' => 0,
                        'is_pinned' => false,
                        'image_url' => 'https://assets0.printio.ru/assets/promo/iphone_x_cases-d0b0d93a7aa2090fd782539414b6f8c8b9e605942b76cade128b89ba88e1c02f.png',
                        'parent_id' => null,
                    ],
                    [
                        'name' => 'Наклейки',
                        'is_active' => true,
                        'order' => 1,
                        'is_pinned' => false,
                        'image_url' => 'https://ae04.alicdn.com/kf/U12ee0c0d8c59469ca3407b3c93e82710M.jpg',
                        'parent_id' => null,
                    ],
                ]
            ],
        ];

        foreach ($categories as $categoryData) {
            $category = Category::create($categoryData['input']);

            foreach ($categoryData['subcategories'] as $subcategoryData) {
                $subcategoryData['parent_id'] = $category->id;
                Category::create($subcategoryData);
            }
        }
    }
}
