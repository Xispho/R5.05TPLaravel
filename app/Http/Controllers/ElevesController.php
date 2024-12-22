<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Eleves;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Notes;

class ElevesController extends Controller
{
    // Affiche le formulaire pour ajouter un élève
    public function create()
    {
        return view('eleves.create');
    }

    // Enregistre l'élève dans la base de données
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numero_etudiant' => 'required|string|max:10|unique:eleves,numero_etudiant',
            'email' => 'required|string|unique:eleves,email',
            'image' => 'string|nullable',
           ]);
           
            if ($validatedData->fails()) { 
                return redirect() ->back() ->withErrors($validatedData) ->withInput();
            }

        // Crée un nouvel élève
        Eleves::create($validatedData->validated());

        return redirect()->route('eleves.index')->with('success', 'Élève créé avec succès.');
    }

    // Affiche la liste des élèves
    public function index()
    {
        $eleves = Eleves::all();
        return view('eleves.index', compact('eleves'));
    }

    // Affiche les détails d'un élève spécifique
    public function show($id)
    {
        $eleve = Eleves::findOrFail($id);
        $moyenne = Notes::where('eleve_id', $id)->get()->avg('note');
        if ($moyenne == null) {
            $moyenne = "Aucune note";
        }
        return view('eleves.show', compact('eleve', 'moyenne'));
    }

    // Affiche le formulaire pour éditer un élève
    public function edit($id)
    {
        $eleve = Eleves::findOrFail($id);
        return view('eleves.edit', compact('eleve'));
    }

    // Met à jour les informations d'un élève dans la base de données
    public function update(Request $request, $id)
    {
        $validatedData = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numero_etudiant' => 'required|string|unique:eleves,numero_etudiant,' . $id,
            'email' => 'required|string',
            'image' => 'string|nullable',
        ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $eleve = Eleves::findOrFail($id);
        $eleve->update($validatedData->validated());

        return redirect()->route('eleves.index')->with('success', 'Élève mis à jour avec succès.');
    }

    // Supprime un élève de la base de données
    public function destroy($id)
    {
        $eleve = Eleves::findOrFail($id);
        $eleve->delete();

        return redirect()->route('eleves.index')->with('success', 'Élève supprimé avec succès.');
    }
}

