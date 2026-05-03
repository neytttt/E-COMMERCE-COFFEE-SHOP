<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $singleOrigin = Category::where('slug', 'single-origin')->first();
        $houseBlend = Category::where('slug', 'house-blends')->first();
        $espresso = Category::where('slug', 'espresso-roasts')->first();

        $products = [
            [
                'name' => 'Ethiopian Yirgacheffe',
                'slug' => 'ethiopian-yirgacheffe',
                'description' => 'A bright and fruity coffee with notes of blueberry and citrus. Grown at high altitudes in the Yirgacheffe region of Ethiopia.',
                'short_description' => 'Bright and fruity with blueberry notes',
                'price' => 650,
                'original_price' => 750,
                'category_id' => $singleOrigin->id,
                'roast_level' => 'light',
                'origin' => 'Ethiopia',
                'region' => 'Yirgacheffe',
                'weight' => '250g',
                'flavor_notes' => 'Blueberry, Citrus, Floral',
                'altitude' => '1,700-2,200m',
                'stock_quantity' => 50,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Colombian Supremo',
                'slug' => 'colombian-supremo',
                'description' => 'A well-balanced coffee with rich caramel sweetness and nutty undertones. Perfect for everyday brewing.',
                'short_description' => 'Balanced with caramel sweetness',
                'price' => 550,
                'category_id' => $singleOrigin->id,
                'roast_level' => 'medium',
                'origin' => 'Colombia',
                'region' => 'Huila',
                'weight' => '250g',
                'flavor_notes' => 'Caramel, Nutty, Chocolate',
                'altitude' => '1,500-1,800m',
                'stock_quantity' => 45,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Grace House Blend',
                'slug' => 'grace-house-blend',
                'description' => 'Our signature house blend crafted for a smooth and satisfying cup. Perfect balance of acidity and body.',
                'short_description' => 'Our signature smooth blend',
                'price' => 480,
                'original_price' => 550,
                'category_id' => $houseBlend->id,
                'roast_level' => 'medium-dark',
                'origin' => 'Blend',
                'weight' => '250g',
                'flavor_notes' => 'Chocolate, Nutty, Smooth',
                'stock_quantity' => 100,
                'is_featured' => true,
                'is_active' => true,
            ],
            [
                'name' => 'Italian Espresso',
                'slug' => 'italian-espresso',
                'description' => 'A bold and dark roast perfect for espresso lovers. Rich crema and intense flavor.',
                'short_description' => 'Bold dark roast for espresso',
                'price' => 520,
                'category_id' => $espresso->id,
                'roast_level' => 'dark',
                'origin' => 'Blend',
                'weight' => '250g',
                'flavor_notes' => 'Dark Chocolate, Bold, Rich',
                'stock_quantity' => 80,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Brazilian Santos',
                'slug' => 'brazilian-santos',
                'description' => 'A smooth and mild coffee with low acidity. Notes of nuts and chocolate.',
                'short_description' => 'Smooth and mild with nutty notes',
                'price' => 450,
                'category_id' => $singleOrigin->id,
                'roast_level' => 'medium',
                'origin' => 'Brazil',
                'region' => 'Santos',
                'weight' => '250g',
                'flavor_notes' => 'Nutty, Chocolate, Mild',
                'altitude' => '800-1,200m',
                'stock_quantity' => 60,
                'is_featured' => false,
                'is_active' => true,
            ],
            [
                'name' => 'Guatemala Antigua',
                'slug' => 'guatemala-antigua',
                'description' => 'A sophisticated coffee with smoky undertones and spicy notes. From the volcanic highlands of Antigua.',
                'short_description' => 'Smoky with spicy notes',
                'price' => 580,
                'category_id' => $singleOrigin->id,
                'roast_level' => 'medium-dark',
                'origin' => 'Guatemala',
                'region' => 'Antigua',
                'weight' => '250g',
                'flavor_notes' => 'Smoke, Spice, Cocoa',
                'altitude' => '1,500-1,700m',
                'stock_quantity' => 40,
                'is_featured' => true,
                'is_active' => true,
            ],
        ];

        foreach ($products as $product) {
            if (!Product::where('slug', $product['slug'])->exists()) {
                Product::create($product);
            }
        }
    }
}