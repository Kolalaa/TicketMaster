<?php

namespace App\Http\Controllers;

use App\Models\Escenari;
use App\Models\Artista;
use App\Models\Concert;
use Illuminate\Http\Request;

class ConcertController extends Controller
{
    public function index()
    {
        $concerts = Concert::with(['artista', 'escenari'])->get();
        return view('concerts.index', compact('concerts'));
    }


    public function create()
    {
        $artistes  = Artista::all();
        $escenaris = Escenari::all();
        return view('concerts.create', compact('artistes', 'escenaris'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'artista_id'  => 'required|exists:artistas,id',
            'escenari_id' => 'required|exists:escenaris,id',
        ]);

        Concert::create($validated);

        return redirect()->route('concerts.index');
    }

    public function show(Concert $concert)
    {
        $concert->load(['artista', 'escenari']);
        return view('concerts.show', compact('concert'));
    }
}
