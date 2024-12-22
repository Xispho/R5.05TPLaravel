<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Notes;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = Notes::all();
        return view('eleve-evaluation.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $notes = Notes::all();
        return view('eleve-evaluation.create', compact('notes'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
        Notes::create($validatedData->validated());

        return redirect()->route('eleve-evaluation.index')->with('success', 'Evaluation créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
