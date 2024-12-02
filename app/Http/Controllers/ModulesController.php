<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Modules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ModulesController extends Controller
{
    // Affiche la liste des modules
    public function index()
    {
        $modules = Modules::all();
        return view('modules.index', compact('modules'));
    }

    // Affiche le formulaire pour ajouter un module
    public function create(Request $request)
    {
        return view('modules.create');
    }

    // Enregistre le module dans la base de données
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'code' => 'required|string|max:5|unique:modules,code',
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|numeric',
           ]);
           
            if ($validatedData->fails()) { 
                return redirect() ->back() ->withErrors($validatedData) ->withInput();
            }

        // Crée un nouvel élève
        Modules::create($validatedData->validated());

        return redirect()->route('modules.index')->with('success', 'Module créé avec succès.');
    }

    // Affiche les détails d'un module spécifique
    public function show(string $id)
    {
        $eleve = Modules::findOrFail($id);
        return view('modules.show', compact('module'));
    }

    // Affiche le formulaire pour éditer un module
    public function edit(string $id)
    {
        $eleve = Modules::findOrFail($id);
        return view('modules.edit', compact('module'));
    }

    // Met à jour les informations d'un module dans la base de données
    public function update(Request $request, string $id)
    {
        $validatedData = Validator::make($request->all(), [
            'code' => 'required|string|max:5|unique:modules,code',
            'nom' => 'required|string|max:255',
            'coefficient' => 'required|numeric',
           ]);

        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }

        $module = Modules::findOrFail($id);
        $module->update($validatedData->validated());

        return redirect()->route('modules.index')->with('success', 'Module mis à jour avec succès.');
    }

    // Supprime un module de la base de données
    public function destroy(string $id)
    {
        $module = Modules::findOrFail($id);
        $module->delete();

        return redirect()->route('module.index')->with('success', 'Module supprimé avec succès.');
    }
}
