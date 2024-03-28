<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(BannersSeeder::class);
        $this->call(SellerSeeder::class);
        $this->call(SpecificationSeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(OrdersSeeder::class);
        $this->call(ArticleSeeder::class);
        $this->call(AdvantagesSeeder::class);
        $this->call(SettingsSeeder::class);
    }
}
