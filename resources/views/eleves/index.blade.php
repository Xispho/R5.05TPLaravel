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
    <h1>Liste des élèves</h1>

    <a href="{{ route('eleves.create') }}">Ajouter un nouvel élève</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Numéro Étudiant</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($eleves as $eleve)
                <tr>
                    <td>{{ $eleve->nom }}</td>
                    <td>{{ $eleve->prenom }}</td>
                    <td>{{ $eleve->numero_etudiant }}</td>
                    <td>{{ $eleve->email }}</td>
                    <td>
                        <a href="{{ route('eleves.show', $eleve->id) }}">Voir</a>
                        <a href="{{ route('eleves.edit', $eleve->id) }}">Modifier</a>

                        <!-- Formulaire de suppression -->
                        <form action="{{ route('eleves.destroy', $eleve->id) }}" method="POST" style="display:inline;">
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