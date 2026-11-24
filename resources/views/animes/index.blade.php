<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime Review - Anime overzicht</title>
</head>
<body>

    <h1>Anime overzicht</h1>

@if(session('success'))
    <p>{{ session('success') }}</p>
@endif

<a href="{{ route('animes.create') }}">
    + Anime toevoegen
</a>

<hr>

@forelse($animes as $anime)

    <div>
        <h2>{{ $anime->title }}</h2>

        <p>{{ $anime->description }}</p>

        <p>Genre: {{ $anime->genre }}</p>
        <p>Afleveringen: {{ $anime->episodes }}</p>
        <p>Releasejaar: {{ $anime->release_year }}</p>

        @if($anime->image)
            <img src="{{ asset('storage/' . $anime->image) }}"
                 alt="{{ $anime->title }}"
                 width="150">
        @endif

        <br>

        <a href="{{ route('animes.show', $anime) }}">
            Bekijken
        </a>

        <a href="{{ route('animes.edit', $anime) }}">
            Bewerken
        </a>

        <form action="{{ route('animes.destroy', $anime) }}"
              method="POST">
            @csrf
            @method('DELETE')

            <button type="submit"
                    onclick="return confirm('Weet je zeker dat je deze anime wilt verwijderen?')">
                Verwijderen
            </button>
        </form>
    </div>

    <hr>

@empty

    <p>Er zijn nog geen anime toegevoegd.</p>

    @endforelse

    </body>
    </html>

