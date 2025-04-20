<?php

namespace App\Http\Controllers;

use App\Models\Donateur;
use App\Models\Don;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DonateurController extends Controller
{
    /**
     * Spécifie le garde à utiliser pour l'authentification
     */
    protected $guard = 'web';


    /**
     * Afficher le profil du donateur
     *
     * @return \Illuminate\View\View
     */
    public function profile()
    {
        $donateur = Auth::user();
        return view('donateur.profile', compact('donateur'));
    }

    /**
     * Mettre à jour le profil du donateur
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateProfile(Request $request)
    {
        /** @var \App\Models\Donateur $donateur */
        $donateur = Auth::user();

        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:donateurs,email,'.$donateur->id,
            'password' => 'nullable|string|min:8|confirmed',
            'ddn' => 'required|date',
            'sexe' => 'required|in:Masculin,Feminin',
        ]);

        $donateur->nom = $request->nom;
        $donateur->prenom = $request->prenom;
        $donateur->email = $request->email;
        $donateur->ddn = $request->ddn;
        $donateur->sexe = $request->sexe;

        if ($request->filled('password')) {
            $donateur->password = Hash::make($request->password);
        }

        $donateur->save();

        return redirect()->route('donateur.profile')
            ->with('success', 'Votre profil a été mis à jour avec succès!');
    }

    /**
     * Afficher l'historique des dons du donateur
     *
     * @return \Illuminate\View\View
     */
    public function historique()
    {
        /** @var \App\Models\Donateur $donateur */
        $donateur = Auth::user();
        $dons = $donateur->dons()->with('association')->latest()->paginate(10);
        return view('donateur.historique', compact('dons'));
    }

    /**
     * Afficher la liste des donateurs (pour admin)
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $donateurs = Donateur::paginate(15);
        return view('admin.donateurs.index', compact('donateurs'));
    }

    /**
     * Afficher les détails d'un donateur (pour admin)
     *
     * @param  \App\Models\Donateur  $donateur
     * @return \Illuminate\View\View
     */
    public function show(Donateur $donateur)
    {
        $dons = $donateur->dons()->with('association')->latest()->get();
        return view('admin.donateurs.show', compact('donateur', 'dons'));
    }

    /**
     * Supprimer un donateur (pour admin)
     *
     * @param  \App\Models\Donateur  $donateur
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Donateur $donateur)
    {
        $donateur->delete();
        return redirect()->route('admin.donateurs.index')
            ->with('success', 'Le donateur a été supprimé avec succès!');
    }
}
