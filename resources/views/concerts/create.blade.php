@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear concert</h1>

        <form action="{{ route('concerts.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nom" class="form-label">Nom del concert</label>
                <input
                    type="text"
                    name="nom"
                    id="nom"
                    class="form-control"
                    value="{{ old('nom') }}"
                    required
                >
                @error('nom')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="artista_id" class="form-label">Artista</label>
                <select name="artista_id" id="artista_id" class="form-select" required>
                    <option value="">Selecciona un artista</option>
                    @foreach ($artistes as $artista)
                        <option
                            value="{{ $artista->id }}"
                            {{ old('artista_id') == $artista->id ? 'selected' : '' }}
                        >
                            {{ $artista->nom }}
                        </option>
                    @endforeach
                </select>
                @error('artista_id')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="data_hora" class="form-label">Data i hora</label>
                <input
                    type="datetime-local"
                    name="data_hora"
                    id="data_hora"
                    class="form-control"
                    value="{{ old('data_hora') }}"
                    required
                >
                @error('data_hora')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="durada_minuts" class="form-label">Durada (minuts)</label>
                <input
                    type="number"
                    name="durada_minuts"
                    id="durada_minuts"
                    class="form-control"
                    min="15"
                    max="300"
                    value="{{ old('durada_minuts', 60) }}"
                    required
                >
                @error('durada_minuts')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="tipus" class="form-label">Tipus de concert</label>
                <select name="tipus" id="tipus" class="form-select" required>
                    <option value="">Selecciona un tipus</option>
                    @foreach (['CONCERT', 'DJ_SET', 'SHOWCASE', 'ACUSTIC'] as $tipus)
                        <option
                            value="{{ $tipus }}"
                            {{ old('tipus') == $tipus ? 'selected' : '' }}
                        >
                            {{ $tipus }}
                        </option>
                    @endforeach
                </select>
                @error('tipus')
                <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Crear concert</button>
            <a href="{{ route('concerts.index') }}" class="btn btn-secondary">Tornar</a>
        </form>
    </div>
@endsection
