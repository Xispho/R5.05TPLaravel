@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter une note</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('eleve-evaluation.store') }}" method="POST">
        @csrf

        <!-- Sélection de l'évaluation -->
        <div class="mb-3">
            <label for="evaluation_id" class="form-label">Évaluation</label>
            <select name="evaluation_id" id="evaluation_id" class="form-control">
                <option value="">-- Sélectionner un élève --</option>
                @foreach ($evaluations as $evaluation)
                    <option value="{{ $evaluation->id }}">{{ $evaluation->titre }}</option>
                @endforeach
            </select>
            @error('evaluation_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Sélection de l'élève -->
        <div class="mb-3">
            <label for="eleve_id" class="form-label">Élève</label>
            <select name="eleve_id" id="eleve_id" class="form-control">
                <option value="">-- Sélectionner un élève --</option>
                @foreach ($eleves as $eleve)
                    <option value="{{ $eleve->id }}">{{ $eleve->nom }} {{ $eleve->prenom }}</option>
                @endforeach
            </select>
            @error('eleve_id')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Champ pour la note -->
        <div class="mb-3">
            <label for="note" class="form-label">Note</label>
            <input type="number" name="note" id="note" class="form-control" value="{{ old('note') }}" step="0.5" min="0" max="20">
            @error('note')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Ajouter la note</button>
    </form>
</div>
@endsection
