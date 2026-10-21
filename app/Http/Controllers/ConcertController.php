<?php

namespace App\Http\Controllers;

use App\Models\Artista;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index()
    {
        $concerts = Concert::with('artista')
            ->orderBy('data_hora')
            ->get();

        return view('concerts.index', compact('concerts'));
    }

    public function create()
    {
        $artistes = Artista::where('actiu', true)
            ->orderBy('nom')
            ->get();

        return view('concerts.create', compact('artistes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'artista_id' => 'required|exists:artistas,id',
            'nom' => 'required|string|max:255',
            'data_hora' => 'required|date',
            'durada_minuts' => 'required|integer|min:15|max:300',
            'tipus' => 'required|in:CONCERT,DJ_SET,SHOWCASE,ACUSTIC',
        ]);

        $concert = Concert::create($validated);

        return redirect()
            ->route('concerts.show', $concert)
            ->with('success', 'Concert creat correctament!');
    }

    public function show(Concert $concert)
    {
        $concert->load('artista');

        return view('concerts.show', compact('concert'));
    }
}
