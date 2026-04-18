<?php

use Illuminate\Support\Facades\Route;
use App\Models\Project; // On dit qu'on va utiliser le Modèle Project

Route::get('/', function () {
    // 1. On récupère TOUS les projets depuis la base de données
    $mesProjets = Project::all(); 

    // 2. On affiche la Vue 'welcome' et on lui donne nos projets
    return view('welcome', [
        'projects' => $mesProjets
    ]);
});
