<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Eleves;
use App\Models\EvaluationEleve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numero_etudiant' => 'required|string|max:10|unique:eleves,numero_etudiant',
            'email' => 'required|string|unique:eleves,email',
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        // Crée un nouvel élève
        Eleves::create($validatedData);

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
        $moyenne = EvaluationEleve::where('eleve_id', $id)->get()->avg('note');
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
        $validator = Validator::make($request->all(), [
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'numero_etudiant' => 'required|string|unique:eleves,numero_etudiant,' . $id,
            'email' => 'required|string',
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $validatedData['image'] = $imagePath;
        }

        $eleve = Eleves::findOrFail($id);
        $eleve->update($validatedData);

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

