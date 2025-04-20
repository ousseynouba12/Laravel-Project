<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DonateurController;
use App\Http\Controllers\AssociationController;
use App\Http\Controllers\DonController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\AdminLoginController;

// Routes pour visiteurs
Route::get('/', function () {
    return view('welcome');
})->name('accueil');

Route::get('/associations', [AssociationController::class, 'index'])->name('associations.index');

// Routes pour authentification donateur
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Routes pour authentification administrateur
Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login']);
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

// Routes pour donateurs connectés
Route::group(['prefix' => 'donateur', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [DonateurController::class, 'dashboard'])->name('donateur.dashboard');
    Route::get('/profile', [DonateurController::class, 'profile'])->name('donateur.profile');
    Route::put('/profile', [DonateurController::class, 'updateProfile'])->name('donateur.profile.update');
    Route::get('/historique', [DonateurController::class, 'historique'])->name('donateur.historique');
    Route::get('/associations/{association}', [AssociationController::class, 'show'])->name('associations.show');
    Route::get('/don/create/{association}', [DonController::class, 'create'])->name('don.create');
    Route::post('/don', [DonController::class, 'store'])->name('don.store');
    Route::get('/dons/suivre', [DonController::class, 'suivre'])->name('don.suivre');
});

// Routes pour administrateurs
Route::group(['prefix' => 'admin', 'middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::resource('/donateurs', DonateurController::class, ['as' => 'admin']);
    Route::resource('/associations', AssociationController::class, ['as' => 'admin']);
    Route::resource('/dons', DonController::class, ['as' => 'admin']);
    Route::get('/transactions', [AdminController::class, 'transactions'])->name('admin.transactions');
    Route::get('/rapports', [AdminController::class, 'rapports'])->name('admin.rapports');
});
