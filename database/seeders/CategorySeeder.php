<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'id' => 1,
            'name' => 'Смартфоны Apple',
            'description' => 'iPhone 13, 14, 15 и другие новые модели'
        ]);

        Category::create([
            'id' => 2,
            'name' => 'Ноутбуки Apple',
            'description' => 'MacBook Air, MacBook Pro'
        ]);

        Category::create([
            'id' => 3,
            'name' => 'Планшеты Apple',
            'description' => 'iPad 10 и новее' 
        ]);

        Category::create([
            'id' => 4,
            'name' => 'Наушники Apple',
            'description' => 'AirPods и другие модели'
        ]);

        Category::create([
            'id' => 5,
            'name' => 'Смарт-часы Apple',
            'description' => 'Apple Watch 8, 9, 10, Ultra'
        ]);

        Category::create([
            'id' => 6,
            'name' => 'PlayStation',
            'description' => 'PlayStation 4, PlayStation 5'
        ]);

        Category::create([
            'id' => 7,
            'name' => 'Фены и стайлеры Dyson',
            'description' => 'Фены и стайлеры для укладки волос'
        ]);

        Category::create([
            'id' => 8,
            'name' => 'Пылесосы Dyson',
            'description' => 'Беспроводные пылесосы'
        ]);
    }
}
