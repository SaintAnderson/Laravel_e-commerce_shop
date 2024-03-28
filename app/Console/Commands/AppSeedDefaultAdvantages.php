<?php

namespace App\Console\Commands;

use App\Models\Advantage;
use Illuminate\Console\Command;

class AppSeedDefaultAdvantages extends Command
{

    protected $signature = 'app:seed-default-advantages';

    protected $description = 'Add Advanateges in block';

    /**
     * @return string
     */
    public function handle(): string
    {
        $advantages = [
            ['title' => 'Доставка', 'description' => 'По всему миру', 'image_url' => 'shipping.svg'],
            ['title' => 'Возврат денег', 'description' => 'Гарантированные выплаты', 'image_url' => 'moneyBack.svg'],
            ['title' => 'Поддержка', 'description' => 'На связи 24/7', 'image_url' => 'support.svg'],
            ['title' => 'Гарантия качества', 'description' => 'Лучшие товары', 'image_url' => 'quality.svg'],
        ];

        foreach ($advantages as $one) {
            Advantage::updateOrCreate(
                [
                    'title' => $one['title']
                ],
                [
                    'image_url' => $one['image_url'],
                    'description' => $one['description']
                ],
            );
        }

        $this->info('Advantages have been added successfully.');
        return "ok";
    }
}
