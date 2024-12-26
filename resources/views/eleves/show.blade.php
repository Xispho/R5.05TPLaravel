@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Informations de l'élève</h1>
    <div class="card">
        <div class="card-header">
            {{ $eleve->nom }} {{ $eleve->prenom }}
        </div>
        <div class="card-body">
            <p><strong>Nom:</strong> {{ $eleve->nom }}</p>
            <p><strong>Prénom:</strong> {{ $eleve->prenom }}</p>
            <p><strong>Email:</strong> {{ $eleve->email }}</p>
            <p><strong>Numéro d'étudiant:</strong> {{ $eleve->numero_etudiant }}</p>
            <strong>Image : </strong><img src="{{ asset('image/' . $eleve->image) }}" alt="Image">
            @if ($moyenne == -1)
                <p><strong>Moyenne:</strong> Non calculée</p>
            @else
                <p><strong>Moyenne:</strong> {{ $moyenne }}</p>
            @endif
        </div>
    </div>
</div>
@endsection