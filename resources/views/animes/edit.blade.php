
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime bewerken</title>
</head>
<body>

<h1>Anime bewerken</h1>

<form action="{{ route('animes.update', $anime) }}"
      method="POST"
      enctype="multipart/form-data">

    @csrf
    @method('PUT')

    <div>
        <label>Titel:</label>
        <input type="text" name="title"
               value="{{ old('title', $anime->title) }}">
        @error('title')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Beschrijving:</label>
        <textarea name="description">{{ old('description', $anime->description) }}</textarea>
        @error('description')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Genre:</label>
        <input type="text" name="genre"
               value="{{ old('genre', $anime->genre) }}">
        @error('genre')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Afleveringen:</label>
        <input type="number" name="episodes"
               value="{{ old('episodes', $anime->episodes) }}">
        @error('episodes')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Releasejaar:</label>
        <input type="number" name="release_year"
               value="{{ old('release_year', $anime->release_year) }}">
        @error('release_year')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <div>
        <label>Huidige poster:</label><br>

        @if($anime->image)
            <img src="{{ asset('storage/' . $anime->image) }}"
                 width="150" alt="{{ $anime->title }}">
        @else
            <p>Geen poster beschikbaar.</p>
        @endif

        <br>

        <label>Nieuwe poster (optioneel):</label>
        <input type="file" name="image" accept="image/*">
        @error('image')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <br>

    <button type="submit">Wijzigingen opslaan</button>

</form>

<br>

<a href="{{ route('animes.index') }}">Terug naar overzicht</a>

</body>
</html>

