<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Http\Requests\TeamUpdateRequest;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams= Team::all();
        $players= Player::all();
        return view('teams.index', [
            'teams'=>$teams,
            'players'=>$players,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('teams.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        $team_badgePath = null;
    
        if ($request->hasFile('team_badge')) {
            $team_badgePath = $request->file('team_badge')->store('team_badge', 'public');
        }

        Team::create([           
            'team_badge' => $team_badgePath,
            'name'=>$request->name,
            'creation_date'=>$request->creation_date,
        ]);
        return redirect()->route('teams.index')->with('success', "équipe ajoutée avec succès");

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $team= Team::find($id);
        $players= Player::all();
        return view('teams.show', [
            'team'=>$team,
            'players'=>$players,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $team= Team::find($id);
        return view('teams.edit', [
            'team'=>$team,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamUpdateRequest $request, string $id)
    {
        $team_badgePath = null;
    
        if ($request->hasFile('team_badge')) {
            $team_badgePath = $request->file('team_badge')->store('team_badge', 'public');
        }

        Team::find($id)->update([           
            'team_badge' => $team_badgePath,
            'name'=>$request->name,
            'creation_date'=>$request->creation_date,
        ]);
        return redirect()->route('teams.index')->with('success', "équipe modifiée avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Team::find($id)->delete();
        return redirect()->route('teams.index')->with('success', "équipe supprimée avec succès");

    }
}
