<?php

namespace App\Http\Controllers;

use App\Models\Association;
use Illuminate\Http\Request;

class AssociationController extends Controller
{
    /**
     * Afficher la liste des associations
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $associations = Association::paginate(12);
        return view('associations.index', compact('associations'));
    }

    /**
     * Afficher le formulaire pour créer une nouvelle association (pour admin)
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.associations.create');
    }

    /**
     * Enregistrer une nouvelle association (pour admin)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:associations',
        ]);

        Association::create([
            'nom' => $request->nom,
            'montantTotal' => 0,
        ]);

        return redirect()->route('admin.associations.index')
            ->with('success', 'L\'association a été créée avec succès!');
    }

    /**
     * Afficher les détails d'une association
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\View\View
     */
    public function show(Association $association)
    {
        $dons = $association->dons()->with('donateur')->latest()->take(5)->get();
        $totalDons = $association->dons()->count();
        
        return view('associations.show', compact('association', 'dons', 'totalDons'));
    }

    /**
     * Afficher le formulaire pour éditer une association (pour admin)
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\View\View
     */
    public function edit(Association $association)
    {
        return view('admin.associations.edit', compact('association'));
    }

    /**
     * Mettre à jour une association (pour admin)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Association $association)
    {
        $request->validate([
            'nom' => 'required|string|max:255|unique:associations,nom,'.$association->id,
        ]);

        $association->nom = $request->nom;
        $association->save();

        return redirect()->route('admin.associations.index')
            ->with('success', 'L\'association a été mise à jour avec succès!');
    }

    /**
     * Supprimer une association (pour admin)
     *
     * @param  \App\Models\Association  $association
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Association $association)
    {
        // Vérifier si des dons sont associés à cette association
        if ($association->dons()->count() > 0) {
            return redirect()->route('admin.associations.index')
                ->with('error', 'Impossible de supprimer cette association car elle a des dons associés.');
        }

        $association->delete();
        
        return redirect()->route('admin.associations.index')
            ->with('success', 'L\'association a été supprimée avec succès!');
    }
}
