@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Note de l'élève : {{$eleve->nom}} {{$eleve->prenom}}</h1>

    <p><strong>Moyenne : </strong>{{$eleve->notes->avg('note')}}</p>

    <table>
        <thead>
            <tr>
                <th>Module</th>
                <th>Evaluation</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eleve->notes as $note)
                <tr>
                    <td>{{ $note->evaluation->module->nom }}</td>
                    <td>{{ $note->evaluation->titre }}</td>
                    <td>{{ $note->note }}</td>
                </tr>
            @endforeach
        </tbody>
</div>
@endsection