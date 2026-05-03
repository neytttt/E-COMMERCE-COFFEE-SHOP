<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Banner;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::with('category')
            ->active()
            ->featured()
            ->inStock()
            ->latest()
            ->take(8)
            ->get();

        $categories = Category::active()
            ->orderBy('sort_order')
            ->get();

        $heroBanners = Banner::active()
            ->hero()
            ->orderBy('sort_order')
            ->take(3)
            ->get();

        $newProducts = Product::with('category')
            ->active()
            ->inStock()
            ->latest()
            ->take(4)
            ->get();

        return view('frontend.home', compact(
            'featuredProducts',
            'categories',
            'heroBanners',
            'newProducts'
        ));
    }

    public function about()
    {
        return view('frontend.about');
    }

    public function contact()
    {
        return view('frontend.contact');
    }
}