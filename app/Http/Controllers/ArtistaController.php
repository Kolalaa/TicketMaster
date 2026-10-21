<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ArtistaController extends Controller
{
    /**
     * Mostrar todos los artistas ordenados por nombre.
     */
    public function index(): View
    {
        $artistes = Artista::orderBy('nom')->get();

        return view('artistes.index', compact('artistes'));
    }

    /**
     * Mostrar crear un artista.
     */
    public function create(): View
    {
        return view('artistes.form');
    }

    /**
     * Guardar artista nuevo.
     */
    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'imatge_url' => 'nullable|url',
            'actiu' => 'sometimes|boolean',
        ]);

        $validated['actiu'] = $request->boolean('actiu');

        $artista = Artista::create($validated);

        return redirect()
            ->route('artistes.show', $artista)
            ->with('success', 'Artista creat correctament.');
    }

    /**
     * Mostrar artista.
     */
    public function show(Artista $artista): View
    {
        return view('artistes.show', compact('artista'));
    }

    /**
     * Mostrar editar artista.
     */
    public function edit(Artista $artista): View
    {
        return view('artistes.form', compact('artista'));
    }

    /**
     * Actualitzar artista.
     */
    public function update(
        Request $request,
        Artista $artista
    ): RedirectResponse {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'pais' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'imatge_url' => 'nullable|url',
            'actiu' => 'sometimes|boolean',
        ]);

        $validated['actiu'] = $request->boolean('actiu');

        $artista->update($validated);

        return redirect()
            ->route('artistes.show', $artista)
            ->with('success', 'Artista actualitzat correctament.');
    }

    /**
     * Eliminar artista.
     */
    public function destroy(Artista $artista): RedirectResponse
    {
        $artista->delete();

        return redirect()
            ->route('artistes.index')
            ->with('success', 'Artista eliminat correctament.');
    }
}
