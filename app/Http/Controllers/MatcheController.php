<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatchRequest;
use App\Http\Requests\MatchUpdateRequest;
use App\Models\Mthes;
use App\Models\Team;
use Illuminate\Http\Request;

class MatcheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams = Team::all();
        return view('matches.create', [
            'teams'=> $teams,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MatchRequest $request)
    {
        Mthes::create([   
            
            'competition'=>$request->competition,
            'matchDate'=>$request->matchDate,
            'stadium'=>$request->stadium,
            'location'=>$request->location,
            'team_one'=>$request->team_one,
            'team_two'=>$request->team_two,
            // 'matchStatus'=>$request->matchStatus,
            // 'ScoreTeamOne'=>$request->ScoreTeamOne,
            // 'ScoreTeamTwo'=>$request->ScoreTeamTwo,
        ]);
        return redirect()->route('home')->with('success', "Match ajoutée avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $matche= Mthes::find($id);
        return view('matches.show', [
            'matche'=>$matche,
            
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $matche= Mthes::find($id);
        $teams = Team::all();
        return view('matches.edit', [
            'matche'=>$matche,
            'teams'=> $teams,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MatchUpdateRequest $request, string $id)
    {
        Mthes::find($id)->update([   
            
            'competition'=>$request->competition,
            'matchDate'=>$request->matchDate,
            'stadium'=>$request->stadium,
            'location'=>$request->location,
            'team_one'=>$request->team_one,
            'team_two'=>$request->team_two,
            'matchStatus'=>$request->matchStatus,
            'ScoreTeamOne'=>$request->ScoreTeamOne,
            'ScoreTeamTwo'=>$request->ScoreTeamTwo,
            'referee'=>$request->referee,
        ]);
        return redirect()->route('home')->with('success', "Match modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Mthes::find($id)->delete();
        return redirect()->route('home')->with('success', "match supprimée avec succès");

    }
}
