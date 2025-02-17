<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\FrontendContent;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        $services = Service::inRandomOrder()->take(3)->get();
        $products = Product::inRandomOrder()->take(5)->get();
        return view('frontend.landing.index', [
            'banners' => $banners,
            'services' => $services,
            'products' => $products,
        ]);
    }

    public function service()
    {
        $services = Service::all();
        $products = Product::inRandomOrder()->take(5)->get();
        return view('frontend.pages.service', compact('services', 'products'));
    }

    public function serviceSingle(Service $service)
    {
        $services = Service::all();
        return view('frontend.pages.service-details', compact('service', 'services'));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function blog()
    {
        return view('frontend.pages.blogs');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function products()
    {
        $products = Product::all();
        $services = Service::inRandomOrder()->take(3)->get();
        return view('frontend.pages.products', ['products' => $products, 'services' => $services]);
    }

    public function productSingle(Product $product)
    {
        $services = Service::inRandomOrder()->take(3)->get();
        return view('frontend.pages.product-details', compact('product', 'services'));
    }

    public function updateContent(Request $request)
    {
        $request->validate([
            'key' => 'required|string',
            'content' => 'required|string'
        ]);

        FrontendContent::updateOrCreate(
            ['key' => $request->key],
            ['content' => $request->content]
        );

        return response()->json(['success' => true, 'message' => 'Content updated successfully']);
    }

    public function getContent()
    {
        $content = FrontendContent::all();
        return response()->json(['data' => $content]);
    }
}
