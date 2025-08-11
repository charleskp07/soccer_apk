<?php

namespace App\Http\Controllers;

use App\Models\Mthes;
use App\Models\Team;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home() {

        $matches= Mthes::all();
        $teams= Team::all();
        return view('home', [
            'matches'=>$matches,
            'teams'=>$teams,
        ]);
    }

    public function login() {
        return view('auth.login');
    }

    
}
