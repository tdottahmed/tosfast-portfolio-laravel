<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        return view('frontend.landing.index');
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
}
