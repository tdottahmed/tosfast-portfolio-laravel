<?php

namespace App\Http\Controllers\Admin;

use App\Models\Team;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\TeamRequest;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::all();
        return view('admin.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        try {
            $request->handle();
            return redirect()->route('teams.index')->with('success', 'Team created successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Team creation failed.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Team $team)
    {
        return view('admin.teams.show', compact('team'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Team $team)
    {
        return view('admin.teams.edit', compact('team'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, Team $team)
    {
        try {
            $request->handle($team);
            return redirect()->route('teams.index')->with('success', 'Team updated successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Team update failed.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Team $team)
    {
        try {
            File::delete(getFilePath($team->image));
            $team->delete();
            return redirect()->route('teams.index')->with('success', 'Team deleted successfully.');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('error', 'Team deletion failed.');
        }
    }
}
