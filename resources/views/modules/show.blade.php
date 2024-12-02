@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Informations du module</h1>
    <div class="card">
        <div class="card-header">
            {{ $module->nom }} {{ $module->prenom }}
        </div>
        <div class="card-body">
            <p><strong>Code:</strong> {{ $module->code }}</p>
            <p><strong>Nom:</strong> {{ $module->nom }}</p>
            <p><strong>Coefficient:</strong> {{ $module->coefficient }}</p>
        </div>
    </div>
</div>
@endsection