<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    // Alle anime bekijken
    public function index()
    {
        $animes = Anime::all();

        return view('animes.index', compact('animes'));
    }

    // Formulier om anime toe te voegen
    public function create()
    {
        return view('animes.create');
    }

    // Nieuwe anime opslaan
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:255',
            'episodes' => 'required|integer|min:1',
            'release_year' => 'required|integer|min:1900|max:2100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('anime', 'public');
        }

        Anime::create($validated);

        return redirect()->route('animes.index')
            ->with('success', 'Anime succesvol toegevoegd!');
    }

    // Eén anime bekijken
    public function show(Anime $anime)
    {
        return view('animes.show', compact('anime'));
    }

    // Anime bewerken
    public function edit(Anime $anime)
    {
        return view('animes.edit', compact('anime'));
    }

    // Gewijzigde anime opslaan
    public function update(Request $request, Anime $anime)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'genre' => 'required|string|max:255',
            'episodes' => 'required|integer|min:1',
            'release_year' => 'required|integer|min:1900|max:2100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('anime', 'public');
        }

        $anime->update($validated);

        return redirect()->route('animes.index')
            ->with('success', 'Anime succesvol bijgewerkt!');
    }

    // Anime verwijderen
    public function destroy(Anime $anime)
    {
        $anime->delete();

        return redirect()->route('animes.index')
            ->with('success', 'Anime succesvol verwijderd!');
    }
}
