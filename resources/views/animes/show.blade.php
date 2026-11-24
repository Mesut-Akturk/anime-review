<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>{{ $anime->title }}</title>
</head>
<body>

<h1>{{ $anime->title }}</h1>

@if($anime->image)
    <img src="{{ asset('storage/' . $anime->image) }}"
         alt="{{ $anime->title }}"
         width="250">
@endif

<p><strong>Beschrijving:</strong> {{ $anime->description }}</p>
<p><strong>Genre:</strong> {{ $anime->genre }}</p>
<p><strong>Aantal afleveringen:</strong> {{ $anime->episodes }}</p>
<p><strong>Releasejaar:</strong> {{ $anime->release_year }}</p>

<br>

<a href="{{ route('animes.index') }}">Terug naar overzicht</a>

<br><br>

<a href="{{ route('animes.edit', $anime) }}">Anime bewerken</a>

</body>
</html>

