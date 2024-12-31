<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\EvaluationEleve;
use App\Models\Evaluation;
use Illuminate\Http\Request;
use App\Models\Eleves;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Mail;
use Notification;
use App\Mail\NotificationNote;
use Carbon\Carbon;

class EleveEvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $notes = EvaluationEleve::all();
        return view('eleve-evaluation.index',compact('notes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $evaluations = Evaluation::all();
        $eleves = Eleves::all();
        return view('eleve-evaluation.create', compact('evaluations', 'eleves'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'evaluation_id' => 'required|numeric',
            'eleve_id' => 'required|numeric',
            'note' => 'required|numeric',
           ]);
           
            if ($validatedData->fails()) { 
                return redirect() ->back() ->withErrors($validatedData) ->withInput();
            }

        $data = $validatedData->validated();
        $evaluation = Evaluation::find($data['evaluation_id']);

        $date = Carbon::now();
        Mail::to('eleve@example.com')->send(new NotificationNote($evaluation->titre, $data['note'], $date));
        EvaluationEleve::create($validatedData->validated());

        return redirect()->route('eleve-evaluation.index')->with('success', 'Note créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $eleve = Eleves::findOrFail($id);
        return view('eleve-evaluation.show', compact('eleve'));
    }

    public function mauvaisEleves()
    {
        $notes = EvaluationEleve::where('note', '<', 10)->get();
        return view('eleve-evaluation.mauvais-eleves', compact('notes'));
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
