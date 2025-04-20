<?php

namespace App\Http\Controllers;

use App\Models\Don;
use App\Models\Association;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonController extends Controller
{
    /**
     * Afficher le formulaire pour créer un nouveau don
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\View\View
     */
    public function create(Association $association)
    {
        return view('donateur.dons.create', compact('association'));
    }

    /**
     * Enregistrer un nouveau don
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric|min:1',
            'type' => 'required|string|max:255',
            'association_id' => 'required|exists:associations,id',
        ]);

        $donateur = Auth::user();
        
        $don = new Don();
        $don->montant = $request->montant;
        $don->date = now();
        $don->type = $request->type;
        $don->donateur_id = $donateur->id;
        $don->association_id = $request->association_id;
        $don->save();

        // Mettre à jour le montant total de l'association
        $association = Association::find($request->association_id);
        $association->montantTotal += $request->montant;
        $association->save();

        return redirect()->route('donateur.historique')
            ->with('success', 'Votre don a été effectué avec succès!');
    }

    /**
     * Afficher la page de suivi des dons
     *
     * @return \Illuminate\View\View
     */
    public function suivre()
    {
        /** @var \App\Models\Donateur $donateur */
        $donateur = Auth::user();
        $dons = $donateur->dons()
            ->with('association')
            ->latest()
            ->get()
            ->groupBy('association_id');
            
        $associations = Association::whereIn('id', $dons->keys())->get()->keyBy('id');
        
        return view('donateur.dons.suivre', compact('dons', 'associations'));
    }

    /**
     * Afficher la liste des dons (pour admin)
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dons = Don::with(['donateur', 'association'])->latest()->paginate(15);
        return view('admin.dons.index', compact('dons'));
    }

    /**
     * Afficher les détails d'un don (pour admin)
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\View\View
     */
    public function show(Don $don)
    {
        $don->load(['donateur', 'association']);
        return view('admin.dons.show', compact('don'));
    }

    /**
     * Supprimer un don (pour admin)
     *
     * @param  \App\Models\Don  $don
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Don $don)
    {
        // Récupérer l'association pour mettre à jour son montant total
        $association = $don->association;
        $association->montantTotal -= $don->montant;
        $association->save();

        $don->delete();
        
        return redirect()->route('admin.dons.index')
            ->with('success', 'Le don a été supprimé avec succès!');
    }
}
