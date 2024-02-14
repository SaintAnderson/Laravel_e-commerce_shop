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
        Banner::factory(10)->create();
    }
}
