<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlayerRequest;
use App\Http\Requests\PlayerUpdateRequest;
use App\Models\Player;
use App\Models\Team;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players= Player::all();
        return view('players.index', [
            'players'=>$players,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teams= Team::all();
        return view('players.create', [
            'teams'=>$teams,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PlayerRequest $request)
    {
        $passport_photoPath = null;
    
        if ($request->hasFile('passport_photo')) {
            $passport_photoPath = $request->file('passport_photo')->store('passport_photo', 'public');
        }

        Player::create([   
            'team_id'=> $request->team_id,
            'passport_photo' => $passport_photoPath,
            'lastname'=>$request->lastname,
            'firstname'=>$request->firstname,
            'age'=>$request->age,
            'weight'=>$request->weight,
            'size'=>$request->size,
            'country_of_origin'=>$request->country_of_origin,
            // 'poste'=>$request->poste,
        ]);
        return redirect()->route('teams.show', $request->team_id)->with('success', "joueur ajoutée avec succès");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $player= Player::find($id);
        $teams= Team::all();
        return view('players.show', [
            'player' =>$player,
            'teams' =>$teams,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $player= Player::find($id);
        $teams= Team::all();
        return view('players.edit', [
            'player' =>$player,
            'teams' =>$teams,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PlayerUpdateRequest $request, string $id)
    {
        $passport_photoPath = null;
    
        if ($request->hasFile('passport_photo')) {
            $passport_photoPath = $request->file('passport_photo')->store('passport_photo', 'public');
        }

        Player::find($id)->update([   
            'team_id'=> $request->team_id,
            'passport_photo' => $passport_photoPath,
            'lastname'=>$request->lastname,
            'firstname'=>$request->firstname,
            'age'=>$request->age,
            'weight'=>$request->weight,
            'size'=>$request->size,
            'country_of_origin'=>$request->country_of_origin,
        ]);
        return redirect()->route('teams.show', $request->team_id)->with('success', "joueur modifié avec succès");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( string $id)
    {
        Player::find($id)->delete();
        return redirect()->route('players.index')->with('success', "joueur supprimée avec succès");
    }
}
