<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\UserVisit;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $widgetData = [];
        $widgetData['totalVisits'] = UserVisit::sum('visits');
        $widgetData['totalProducts'] = Product::count();
        return view('admin.dashboard.index', compact('widgetData'));
    }

    public function visitors()
    {
        $visitors = UserVisit::all();
        return view('admin.dashboard.visitors', compact('visitors'));
    }
}
