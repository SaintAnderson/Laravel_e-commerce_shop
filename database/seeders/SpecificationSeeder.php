<?php

namespace Database\Seeders;

use App\Models\Specification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecificationSeeder extends Seeder
{
    public function run(): void
    {
        $specifications = [
            ['name' =>  'объем памяти', 'measure' => 'Гб'],
            ['name' =>  'объем оперативной памяти', 'measure' => 'Гб'],
            ['name' =>  'материал корпуса', 'measure' => ''],
            ['name' =>  'материал', 'measure' => ''],
            ['name' =>  'ширина', 'measure' => 'см'],
            ['name' =>  'длина', 'measure' => 'см'],
        ];
        foreach ($specifications as $specification)
        {
            Specification::create($specification);
        }
    }
}
