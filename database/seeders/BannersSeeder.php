<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannersSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $banners = [
          [
              'title' => 'Новые товары!',
              'description' => 'Выбирайте самые новые и качественные товары в нашем каталоге',
              'image_url' => 'https://www.notebookcheck-ru.com/uploads/tx_nbc2/4_to_3_Teaser_Apple_iPhone_13_Pro.jpg',
              'url' => '/catalog',
          ],
            [
                'title' => 'Обзоры на товары!',
                'description' => 'С нашими обзорами на товары вы можете ознакомиться в блоге',
                'image_url' => 'https://mysina.ru/wp-content/uploads/2018/12/kak-vesti-blog-v-instagram.jpg',
                'url' => '/articles',
            ]
        ];
        foreach ($banners as $banner) {
            Banner::create($banner);
        }
    }
}
