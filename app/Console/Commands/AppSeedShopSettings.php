<?php

namespace App\Console\Commands;

use App\Models\Setting;
use Illuminate\Console\Command;

class AppSeedShopSettings extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:seed-shop-settings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Adds initial shop settings to the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Setting::updateOrCreate(['key' => 'shop_title'], ['value' => 'Team 5 shop']);
        Setting::updateOrCreate(['key' => 'shop_description'], ['value' => 'Тут будет будущее описание магазина Team 5 shop']);

        $this->info('Shop settings have been added successfully.');

        return 0;
    }
}
