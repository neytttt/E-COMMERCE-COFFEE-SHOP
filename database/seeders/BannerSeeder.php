<?php

namespace Database\Seeders;

use App\Models\Banner;
use Illuminate\Database\Seeder;

class BannerSeeder extends Seeder
{
    public function run(): void
    {
        $banners = [
            [
                'title' => 'Premium Coffee Collection',
                'subtitle' => 'Discover our finest curated selection',
                'position' => 'hero',
                'link' => '/products',
                'button_text' => 'Shop Now',
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'New Arrivals',
                'subtitle' => 'Freshly roasted beans just in',
                'position' => 'banner',
                'link' => '/products?sort=newest',
                'button_text' => 'View New',
                'is_active' => true,
                'sort_order' => 2,
            ],
        ];

        foreach ($banners as $banner) {
            Banner::updateOrCreate(
                ['title' => $banner['title'], 'position' => $banner['position']],
                $banner
            );
        }
    }
}