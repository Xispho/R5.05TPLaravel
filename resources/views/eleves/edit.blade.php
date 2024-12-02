@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Editer les informations de l'élève</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eleves.update', $eleve->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $eleve->nom }}" required>
        </div>
        
        <div class="form-group">
            <label for="prenom">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="{{ $eleve->prenom }}" required>
        </div>
        
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $eleve->email }}" required>
        </div>
        
        <div class="form-group">
            <label for="numero_etudiant">numero_etudiant</label>
            <input type="numero_etudiant" class="form-control" id="numero_etudiant" name="numero_etudiant" value="{{ $eleve->numero_etudiant }}" required>
        </div>
        
        <div class="form-group">
            <label for="date_naissance">Date de Naissance</label>
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" value="{{ $eleve->date_naissance }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="url" class="form-control" id="image" name="image" value="{{ $eleve->image }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection