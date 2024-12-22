@extends('layouts.app')

@section('content')
<div class="container">


    <h1>Listes des mauvais eleves</h1>

    <table>
        <thead>
            <tr>
                <th>Eleve</th>
                <th>Module</th>
                <th>Evaluation</th>
                <th>Note</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{ $note->eleve->nom }} {{ $note->eleve->prenom }}</td>
                    <td>{{ $note->evaluation->module->nom }}</td>
                    <td>{{ $note->evaluation->titre }}</td>
                    <td>{{ $note->note }}</td>
                </tr>
            @endforeach
    </table>
</div>
@endsection