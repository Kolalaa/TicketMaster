@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1>Concerts</h1>
            <a href="{{ route('concerts.create') }}" class="btn btn-primary">
                Crear concert
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($concerts->isEmpty())
            <p>No hi ha concerts programats.</p>
        @else
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Artista</th>
                    <th>Data i hora</th>
                    <th>Tipus</th>
                    <th>Durada (minuts)</th>
                    <th>Accions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($concerts as $concert)
                    <tr>
                        <td>
                            <a href="{{ route('concerts.show', $concert) }}">
                                {{ $concert->nom }}
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('artistes.show', $concert->artista) }}">
                                {{ $concert->artista->nom }}
                            </a>
                        </td>
                        <td>{{ $concert->data_hora->format('d/m/Y H:i') }}</td>
                        <td>
                            @php
                                $colors = [
                                    'CONCERT' => 'primary',
                                    'DJ_SET' => 'dark',
                                    'SHOWCASE' => 'success',
                                    'ACUSTIC' => 'info',
                                ];
                            @endphp
                            <span class="badge bg-{{ $colors[$concert->tipus] ?? 'secondary' }}">
                                {{ $concert->tipus }}
                            </span>
                        </td>
                        <td>{{ $concert->durada_minuts }}</td>
                        <td>
                            <a href="{{ route('concerts.show', $concert) }}"
                               class="btn btn-sm btn-info">
                                Veure
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
