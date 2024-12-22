@extends('layouts.app')

@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@section('content')

    <a href="{{ route('eleve-evaluation.create') }}">Noter un élève</a>

    <h1>Notes des élèves</h1>
    <table>
        <thead>
            <tr>
                <th>Eleve</th>
            </tr>
        </thead>
        <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{{ $note->eleve->nom }}</td>
                    <td>
                        <a href="{{ route('eleve-evaluation.show', $note->eleve->id) }}">Voir les notes</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
