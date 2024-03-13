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
        $newSettings = [
            ['key' => 'shop_title', 'value' => 'Team 5 shop'],
            ['key' => 'shop_description', 'value' => 'Тут будет будущее описание магазина Team 5 shop'],
            ['key' => 'shop_address', 'value' => 'г.Москва, ул. Тверская, дом 1'],
            ['key' => 'shop_phone', 'value' => '+7 (999) 000-00-00'],
            ['key' => 'shop_email', 'value' => 'shop@example.com'],
        ];

        foreach ($newSettings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], ['value' => $setting['value']]);
        }

        $this->info('Shop settings have been added successfully.');

        return 0;
    }
}
