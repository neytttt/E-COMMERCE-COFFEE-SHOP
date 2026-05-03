<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Single Origin',
                'slug' => 'single-origin',
                'description' => 'Premium single origin coffee beans from around the world',
                'type' => 'coffee',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'House Blends',
                'slug' => 'house-blends',
                'description' => 'Our signature house blends crafted with care',
                'type' => 'coffee',
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Espresso Roasts',
                'slug' => 'espresso-roasts',
                'description' => 'Dark and bold espresso roasts perfect for your morning cup',
                'type' => 'coffee',
                'is_active' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Coffee Mugs',
                'slug' => 'coffee-mugs',
                'description' => 'Premium coffee mugs and drinkware',
                'type' => 'merchandise',
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'name' => 'Brewing Equipment',
                'slug' => 'brewing-equipment',
                'description' => 'Quality brewing equipment for the perfect cup',
                'type' => 'merchandise',
                'is_active' => true,
                'sort_order' => 5,
            ],
            [
                'name' => 'Gift Sets',
                'slug' => 'gift-sets',
                'description' => 'Perfect gift sets for coffee lovers',
                'type' => 'bundle',
                'is_active' => true,
                'sort_order' => 6,
            ],
        ];

        foreach ($categories as $category) {
            Category::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}