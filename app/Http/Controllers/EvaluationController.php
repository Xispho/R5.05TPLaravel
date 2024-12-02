<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Evaluation;
use App\Models\Modules;
use Illuminate\Support\Facades\Validator;

class EvaluationController extends Controller
{
    public function index()
    {        
        $evaluations = Evaluation::all();
        return view('evaluations.index',compact('evaluations'));
    }

    public function create()
    {
        $modules = Modules::all();
        return view('evaluations.create', compact('modules'));
    }


    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'module_id' => 'required|numeric',
            'titre' => 'required|string|max:255',
            'date' => 'required|date',
            'coefficient' => 'required|numeric',
           ]);
           
            if ($validatedData->fails()) { 
                return redirect() ->back() ->withErrors($validatedData) ->withInput();
            }

        // Crée un nouvel élève
        Evaluation::create($validatedData->validated());

        return redirect()->route('evaluations.index')->with('success', 'Evaluation créé avec succès.');
    }

    public function show($id)
    {
        $evaluation = Evaluation::with('evaluationEleves.eleve')->findOrFail($id);
        return view('evaluations.show', compact('evaluation'));
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        $evaluation = Evaluation::findOrFail($id);
        $evaluation->delete();

        return redirect()->route('evaluations.index')->with('success', 'Évaluations supprimé avec succès.');
    }

}
