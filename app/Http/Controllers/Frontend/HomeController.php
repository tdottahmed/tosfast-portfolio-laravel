<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Models\FrontendContent;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('frontend.landing.index', [
            'banners' => $banners,
        ]);
    }

    public function service()
    {
        return view('frontend.pages.service');
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
