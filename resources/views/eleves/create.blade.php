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
    <div class='container'>
        <h1>Ajouter un élève</h1>

        <form action='{{ route('eleves.store') }}' method='POST' enctype="multipart/form-data">
            @csrf
            <div class='mb-3'>
                <label for='nom' class='form-label'>Nom</label>
                <input type='text' name='nom' class='form-control' id='nom' value='{{ old('nom') }}'>
            </div>
            <div class='mb-3'>
                <label for='prenom' class='form-label'>Prénom</label>
                <input type='text' name='prenom' class='form-control' id='prenom' value='{{ old('prenom') }}'>
            </div>
            <div class='mb-3'>
                <label for='date_naissance' class='form-label'>Date de naissance</label>
                <input type='date' name='date_naissance' class='form-control' id='date_naissance' value='{{ old('date_naissance') }}'>
            </div>
            <div class='mb-3'>
                <label for='numero_etudiant' class='form-label'>Numéro d'étudiant</label>
                <input type='text' name='numero_etudiant' class='form-control' id='numero_etudiant' value='{{ old('numero_etudiant') }}'>
            </div>
            <div class='mb-3'>
                <label for='email' class='form-label'>Email</label>
                <input type='email' name='email' class='form-control' id='email' value='{{ old('email') }}'>
            </div>
            <div class='mb-3'>    
                @csrf
                <label for='image' class='form-label'>Image</label>
                <input type='file' name='image' class='form-control' id='image' value='{{ old('image') }}'>
            </div>

            <button type='submit' class='btn btn-primary'>Ajouter</button>
        </form>
    </div>
@endsection