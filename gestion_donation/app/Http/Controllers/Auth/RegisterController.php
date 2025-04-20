<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Donateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /**
     * Afficher le formulaire d'inscription
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Traiter la demande d'inscription
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(Request $request)
    {
        // Valider les données du formulaire
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:donateurs',
            'password' => 'required|string|min:8|confirmed',
            'ddn' => 'required|date',
            'sexe' => 'required|in:Masculin,Feminin',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Créer le donateur
        $donateur = Donateur::create([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'ddn' => $request->ddn,
            'sexe' => $request->sexe,
        ]);

        // Connecter l'utilisateur
        Auth::login($donateur);

        // Rediriger vers le tableau de bord
        return redirect()->route('donateur.dashboard')
            ->with('success', 'Votre compte a été créé avec succès!');
    }
}
