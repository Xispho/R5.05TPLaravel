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
    <h1>Liste des évaluations</h1>

    <a href="{{ route('evaluations.create') }}">Ajouter une nouvelle évaluation</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Module</th>
                <th>Nom</th>
                <th>Date</th>
                <th>Coefficient</th>
            </tr>
        </thead>
        <tbody>
            @foreach($evaluations as $evaluation)
                <tr>
                    <td>{{ $evaluation->module->nom }}</td>
                    <td>{{ $evaluation->titre }}</td>
                    <td>{{ \Carbon\Carbon::parse($evaluation->date)->format('d/m/Y') }}</td>
                    <td>{{ $evaluation->coefficient }}</td>
                    <td>
                        <a href="{{ route('evaluations.show', $evaluation->id) }}">Voir</a>
                        <a href="{{ route('evaluations.edit', $evaluation->id) }}">Modifier</a>

                        
                        <!-- Formulaire de suppression -->
                        <form action="{{ route('evaluations.destroy', $evaluation->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection