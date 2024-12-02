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
    <h1>Liste des modules</h1>

    <a href="{{ route('modules.create') }}">Ajouter un nouveau module</a>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Code</th>
                <th>Nom</th>
                <th>Coefficient</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($modules as $module)
                <tr>
                    <td>{{ $module->code }}</td>
                    <td>{{ $module->nom }}</td>
                    <td>{{ $module->coefficient }}</td>
                    <td>
                        <a href="{{ route('modules.show', $module->id) }}">Voir</a>
                        <a href="{{ route('modules.edit', $module->id) }}">Modifier</a>

                        <!-- Formulaire de suppression -->
                        <form action="{{ route('modules.destroy', $module->id) }}" method="POST" style="display:inline;">
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