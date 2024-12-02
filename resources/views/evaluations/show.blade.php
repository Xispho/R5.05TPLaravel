@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Notes pour l'évaluation : {{ $evaluation->titre }}</h1>
    <p><strong>Module :</strong> {{ $evaluation->module->nom }}</p>
    <p><strong>Date :</strong> {{ $evaluation->date }}</p>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Élève</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluation->evaluationEleves as $evaluationEleve)
            <tr>
                <td>{{ $evaluationEleve->eleve->nom }} {{ $evaluationEleve->eleve->prenom }}</td>
                <td>{{ $evaluationEleve->note }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
