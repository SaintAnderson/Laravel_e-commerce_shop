<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Specification;
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
    }
}
