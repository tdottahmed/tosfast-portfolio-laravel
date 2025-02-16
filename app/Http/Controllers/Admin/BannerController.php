<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BannerRequest;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index', compact('banners'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(BannerRequest $request)
    {
        try {
            $request->handle();
            return redirect()->route('banners.index')->with('success', 'Banner created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Banner creation failed.');
        }
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(BannerRequest $request, Banner $banner)
    {
        try {
            $request->handle($banner);
            return redirect()->route('banners.index')->with('success', 'Banner updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Banner update failed.');
        }
    }
    public function destroy(Banner $banner)
    {
        try {
            File::delete(getFilePath($banner->image));
            $banner->delete();
            return redirect()->route('banners.index')->with('success', 'Banner deleted successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Banner deletion failed.');
        }
    }
}
