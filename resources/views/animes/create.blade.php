<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anime toevoegen</title>
</head>
<body>

    <h1>Nieuwe anime toevoegen</h1>

    <form action="{{ route('animes.store') }}"
          method="POST"
          enctype="multipart/form-data">

@csrf

<div>
    <label>Titel:</label>
    <input type="text" name="title" value="{{ old('title') }}">
    @error('title')
    <p>{{ $message }}</p>
    @enderror
</div>

<br>

<div>
    <label>Beschrijving:</label>
    <textarea name="description">{{ old('description') }}</textarea>
    @error('description')
    <p>{{ $message }}</p>
    @enderror
</div>

<br>

<div>
    <label>Genre:</label>
    <input type="text" name="genre" value="{{ old('genre') }}">
    @error('genre')
    <p>{{ $message }}</p>
    @enderror
</div>

<br>

<div>
    <label>Aantal afleveringen:</label>
    <input type="number" name="episodes" value="{{ old('episodes') }}">
    @error('episodes')
    <p>{{ $message }}</p>
    @enderror
</div>

<br>

<div>
    <label>Releasejaar:</label>
    <input type="number" name="release_year" value="{{ old('release_year') }}">
    @error('release_year')
    <p>{{ $message }}</p>
    @enderror
</div>

<br>

<div>
    <label>Anime poster:</label>
    <input type="file" name="image" accept="image/*">
    @error('image')
    <p>{{ $message }}</p>
    @enderror
</div>

<br>

<button type="submit">Anime opslaan</button>

</form>

<br>

<a href="{{ route('animes.index') }}">Terug naar overzicht</a>

</body>
</html>
