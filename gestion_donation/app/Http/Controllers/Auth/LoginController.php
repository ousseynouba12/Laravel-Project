<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Donateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Afficher le formulaire de connexion pour donateur
     *
     * @return \Illuminate\View\View
     */
   public function showLoginForm()
{
    return view('pagespublic.connexion');
}

    /**
     * Traiter la demande de connexion pour donateur
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Récupérer le donateur
        $donateur = Donateur::where('email', $request->email)->first();

        // Vérifier si le donateur existe et si le mot de passe est correct
        if ($donateur && Hash::check($request->password, $donateur->password)) {
            Auth::login($donateur);
            return redirect()->route('donateur.dashboard');
        }

        // Authentification échouée
        return back()->withErrors([
            'email' => 'Les informations de connexion ne correspondent pas à nos enregistrements.',
        ])->withInput($request->except('password'));
    }

    /**
     * Déconnecter le donateur
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect('/');
    }
}
