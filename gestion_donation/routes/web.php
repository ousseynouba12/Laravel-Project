<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Routes pour les pages principales
Route::get('/', function () {
    return view('welcome');
})->name('accueil');

// Routes pour l'authentification donateur
Route::get('/connexion-donateur', [LoginController::class, 'showLoginForm'])
    ->name('donateur.connexion');

Route::post('/connexion-donateur', [LoginController::class, 'login'])
    ->name('donateur.login');

Route::post('/deconnexion-donateur', [LoginController::class, 'logout'])
    ->name('donateur.logout');

// Routes pour l'inscription donateur
Route::get('/inscription-donateur', function() {
    return view('donateur.incription');
})->name('donateur.inscription');

Route::post('/inscription-donateur', [RegisterController::class, 'register'])
    ->name('donateur.register');

Route::get('/connexion-admin', function() {
    return view('admin.connexionadmin');
})->name('admin.connexion');