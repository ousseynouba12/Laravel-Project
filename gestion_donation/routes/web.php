<?php

use Illuminate\Support\Facades\Route;

// Routes pour les pages principales
Route::get('/', function () {
    return view('welcome');
})->name('accueil');

// Routes pour les pages d'authentification
Route::get('/connexion-donateur', function() {
    return view('donateur.connexiondonateur');
})->name('donateur.connexion');

Route::get('/inscription-donateur', function() {
    return view('donateur.incription');
})->name('donateur.inscription');

Route::get('/connexion-admin', function() {
    return view('admin.connexionadmin');
})->name('admin.connexion');
