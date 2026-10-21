<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>{{ isset($concert) ? 'Editar concierto' : 'Crear concierto' }}</title>
</head>
<body>
<h1>{{ isset($concert) ? 'Editar concierto' : 'Crear concierto' }}</h1>

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form
    action="{{ isset($concert) ? route('concerts.update', $concert->id) : route('concerts.store') }}"
    method="POST"
>
    @csrf

    @if (isset($concert))
        @method('PUT')
    @endif

    <label for="nom">Nombre del concierto:</label><br>
    <input
        type="text"
        id="nom"
        name="nom"
        value="{{ old('nom', $concert->nom ?? '') }}"
        required
    ><br><br>

    <label for="artista_id">Artista:</label><br>
    <select id="artista_id" name="artista_id" required>
        <option value="">Selecciona un artista</option>
        @foreach ($artistes as $artista)
            <option
                value="{{ $artista->id }}"
                @selected(old('artista_id', $concert->artista_id ?? '') == $artista->id)
            >
                {{ $artista->nom }}
            </option>
        @endforeach
    </select><br><br>

    <label for="lloc">Lugar:</label><br>
    <input
        type="text"
        id="lloc"
        name="lloc"
        value="{{ old('lloc', $concert->lloc ?? '') }}"
        required
    ><br><br>

    <label for="data_hora">Fecha y hora:</label><br>
    <input
        type="datetime-local"
        id="data_hora"
        name="data_hora"
        value="{{ old('data_hora', isset($concert) ? $concert->data_hora->format('Y-m-d\TH:i') : '') }}"
        required
    ><br><br>

    <label for="preu">Precio (€):</label><br>
    <input
        type="number"
        id="preu"
        name="preu"
        min="0"
        step="0.01"
        value="{{ old('preu', $concert->preu ?? '') }}"
        required
    ><br><br>

    <button type="submit">
        {{ isset($concert) ? 'Guardar cambios' : 'Crear concierto' }}
    </button>
</form>

<p><a href="{{ route('concerts.index') }}">Volver al listado</a></p>
</body>
</html>
