<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Routes pour les pages principales
Route::get('/', function () {
    return view('/pagespublic/home');
})->name('accueil');

// Route de connexion principale redirigée vers connexion-donateur
Route::get('/connexion', function () {
    return redirect()->route('donateur.connexion');
})->name('connexion');

Route::get('/inscription', function () {
    return view('pagespublic.inscription');
})->name('inscription');


// Routes pour l'authentification donateur
Route::get('/connexion-donateur', function() {
    return view('pagespublic.connexion');
})->name('donateur.connexion');

Route::post('/connexion-donateur', [LoginController::class, 'login'])
    ->name('donateur.login');

Route::post('/deconnexion-donateur', [LoginController::class, 'logout'])
    ->name('donateur.logout');

// Routes pour l'inscription donateur
Route::get('/inscription-donateur', function() {
    return view('pagespublic.inscription');
})->name('donateur.inscription');

Route::post('/inscription-donateur', [RegisterController::class, 'register'])
    ->name('donateur.register');

Route::get('/connexion-admin', function() {
    return view('admin.connexionadmin');
})->name('admin.connexion');

Route::get('/dashboard-admin', function() {
    return view('admin.dashboardadmin');
})->name('admin.dashboard');

// Routes pour le tableau de bord et le profil donateur
Route::middleware(['auth'])->group(function () {
    Route::get('/donateur/dashboard', function() {
        return view('donateur.dashboard');
    })->name('donateur.dashboard');
    
    Route::get('/donateur/profile', [\App\Http\Controllers\DonateurController::class, 'profile'])
        ->name('donateur.profile');
    
    Route::get('/donateur/historique', [\App\Http\Controllers\DonateurController::class, 'historique'])
        ->name('donateur.historique');
});