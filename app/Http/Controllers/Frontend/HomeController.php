<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Mail\OrganizationEmail;
use App\Models\FrontendContent;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

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
        $services = Service::inRandomOrder()->take(3)->get();
        $products = Product::inRandomOrder()->take(5)->get();
        return view('frontend.pages.about',compact('services', 'products'));
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

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);
        try {
            Mail::to(getSetting('app_email'))->send(new OrganizationEmail(
                $request->name,
                $request->email,
                $request->subject,
                $request->message
            ));
            return redirect()->route('frontend.home')->with('success', 'Email sent successfully');
        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return back()->with('error', 'Email sent failed');
        }
    }
}
