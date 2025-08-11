<?php

use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\MatcheController;
use App\Http\Controllers\MyProfilController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

Route::middleware([GuestMiddleware::class])->group(function() {

    // Route::get('/', [MainController::class, 'home'])->name('home');
    Route::get('/login', [MainController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');


   
});

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/Team', [TeamController::class, 'index'])->name('teams.index');
Route::get('/Team/{id}/show', [TeamController::class, 'show'])->name('teams.show');

Route::get('/Player', [PlayerController::class, 'index'])->name('players.index');
Route::get('/Player/{id}/show', [PlayerController::class, 'show'])->name('players.show');

Route::get('/Matchs/{id}/show', [MatcheController::class, 'show'])->name('matches.show');


Route::middleware(['auth'])->group(function() {
    
    

    
    //Administrateur
    Route::get('/Administrateur', [AdministratorController::class, 'index'])->name('adm.index');
    Route::get('/Administrateur/create', [AdministratorController::class, 'create'])->name('adm.create');

    //Equipes
    Route::get('/Team/create', [TeamController::class, 'create'])->name('teams.create');
    Route::post('/Team/store', [TeamController::class, 'store'])->name('teams.store');
    Route::get('/Team/{id}/edit', [TeamController::class, 'edit'])->name('teams.edit');
    Route::put('/Team/{id}/update', [TeamController::class, 'update'])->name('teams.update');
    Route::delete('/Team/{id}/destroy', [TeamController::class, 'destroy'])->name('teams.destroy');


    //Joueur
    Route::get('/Player/create', [PlayerController::class, 'create'])->name('players.create');
    Route::post('/Player/store', [PlayerController::class, 'store'])->name('players.store');
    Route::get('/Player/{id}/edit', [PlayerController::class, 'edit'])->name('players.edit');
    Route::put('/Player/{id}/update', [PlayerController::class, 'update'])->name('players.update');
    Route::delete('/Player/{id}/destroy', [PlayerController::class, 'destroy'])->name('players.destroy');

    //Macths
    //Match
    Route::get('/Matchs/create', [MatcheController::class, 'create'])->name('matches.create');
    Route::post('/Matchs/store', [MatcheController::class, 'store'])->name('matches.store');
    Route::get('/Matchs/{id}/edit', [MatcheController::class, 'edit'])->name('matches.edit');
    Route::put('/Matchs/{id}/update', [MatcheController::class, 'update'])->name('matches.update');
    Route::delete('/Matchs/{id}/destroy', [MatcheController::class, 'destroy'])->name('matches.destroy');


    //Mon profil
    Route::get('/Profil', [MyProfilController::class, 'index'])->name('profil.index');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});




Route::get('/registration', [MainController::class, 'registration'])->name('auth.registration');//à redefinir


















