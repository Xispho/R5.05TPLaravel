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

    <form action="{{ route('modules.update', $module->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="code">Code</label>
            <input type="text" class="form-control" id="code" name="code" value="{{ $module->code }}" required>
        </div>
        
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $module->nom }}" required>
        </div>
        
        <div class="form-group">
            <label for="coefficient">Coefficient</label>
            <input type="float" class="form-control" id="coefficient" name="coefficient" value="{{ $module->coefficient }}" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
@endsection