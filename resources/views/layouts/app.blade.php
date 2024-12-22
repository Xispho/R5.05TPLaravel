<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon Application')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <header>
            <h1>Mon Application</h1>
            <nav>
                <ul>
                    <li><a href="{{ url('/') }}">Accueil</a></li>
                    <li><a href="{{ url('/eleves') }}">Élèves</a></li>
                    <li><a href="{{ url('/modules') }}">Modules</a></li>
                    <li><a href="{{ url('/evaluations') }}">Évaluations</a></li>
                    <li><a href="{{ url('/eleve-evaluation') }}">Notes</a></li>
                </ul>
            </nav>
        </header>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>