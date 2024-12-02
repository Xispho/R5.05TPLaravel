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
        <h1>Ajouter un module</h1>

        <form action='{{ route('modules.store') }}' method='POST'>
            @csrf
            <div class='mb-3'>
                <label for='code' class='form-label'>Code</label>
                <input type='text' name='code' class='form-control' id='code' value='{{ old('code') }}'>
            </div>
            <div class='mb-3'>
                <label for='nom' class='form-label'>Nom</label>
                <input type='text' name='nom' class='form-control' id='nom' value='{{ old('nom') }}'>
            </div>
            <div class='mb-3'>
                <label for='coefficient' class='form-label'>Coefficient</label>
                <input type='float' name='coefficient' class='form-control' id='coefficient' value='{{ old('coefficient') }}'>
            </div>

            <button type='submit' class='btn btn-primary'>Ajouter</button>
        </form>
    </div>
@endsection