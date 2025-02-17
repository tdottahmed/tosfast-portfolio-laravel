<?php

namespace App\Http\Controllers\Admin;

use App\Models\Technology;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TechnologyRequest;
use Illuminate\Support\Facades\File;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all();
        return view('admin.technologies.index', compact('technologies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technologies.crate');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TechnologyRequest $request)
    {
        try {
            $request->handle();
            return redirect()->route('technologies.index')->with('success', 'Technology created successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('technologies.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Technology $technology)
    {
        return view('admin.technologies.show', compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Technology $technology)
    {
        return view('admin.technologies.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TechnologyRequest $request, Technology $technology)
    {
        try {
            $request->handle($technology);
            return redirect()->route('technologies.index')->with('success', 'Technology updated successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('technologies.index')->with('error', $th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Technology $technology)
    {
        try {
            File::delete($technology->image);
            $technology->delete();
            return redirect()->route('technologies.index')->with('success', 'Technology deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->route('technologies.index')->with('error', $th->getMessage());
        }
    }
}
