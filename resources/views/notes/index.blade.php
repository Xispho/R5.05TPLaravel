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
    <h1>Évaluations des élèves</h1>

    <form method="GET" action="{{ route('notes.index') }}">
        <label for="eleve_id">Sélectionnez un élève :</label>
        <select name="eleve_id" id="eleve_id" required>
            <option value="">-- Choisissez un élève --</option>
            @foreach($eleves as $eleve)
                <option value="{{ $eleve->id }}" {{ request('eleve_id') == $eleve->id ? 'selected' : '' }}>
                    {{ $eleve->nom }} {{ $eleve->prenom }}
                </option>
            @endforeach
        </select>
        <button type="submit">Voir les notes</button>
    </form>

    @if(isset($notes) && isset($moyenne))
        <h2>Notes de {{ $eleveSelectionne->nom }} {{ $eleveSelectionne->prenom }}</h2>

        <table>
            <thead>
                <tr>
                    <th>Matière</th>
                    <th>Note</th>
                    <th>Commentaires</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notes as $note)
                    <tr>
                        <td>{{ $note->matiere }}</td>
                        <td>{{ $note->note }}</td>
                        <td>{{ $note->commentaires }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h3>Moyenne générale : {{ number_format($moyenne, 2) }}</h3>
    @elseif(request('eleve_id'))
        <p>Aucune note trouvée pour cet élève.</p>
    @endif
@endsection
