@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Note de l'élève : {{$evaluation->eleve->nom}}</h1>
</div>
@endsection