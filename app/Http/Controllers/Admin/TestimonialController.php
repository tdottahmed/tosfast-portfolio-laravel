<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\TestimonialRequest;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialRequest $request)
    {
        try {
            $request->handle();
            return redirect()->route('testimonials.index')->with('success', 'Testimonial created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Testimonial creation failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonial $testimonial)
    {
        return view('admin.testimonials.show', compact('testimonial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialRequest $request, Testimonial $testimonial)
    {
        try {
            $request->handle($testimonial);
            return redirect()->route('testimonials.index')->with('success', 'Testimonial updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Testimonial update failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        try {
            File::delete(getFilePath($testimonial->image));
            $testimonial->delete();
            return redirect()->route('testimonials.index')->with('success', 'Testimonial deleted successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Testimonial deletion failed.');
        }
    }
}
