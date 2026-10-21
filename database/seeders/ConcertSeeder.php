<?php

namespace Database\Seeders;

use App\Models\Artista;
use App\Models\Concert;
use Illuminate\Database\Seeder;

class ConcertSeeder extends Seeder
{
    public function run(): void
    {
        $artistes = Artista::where('actiu', true)->get();

        if ($artistes->isEmpty()) {
            return;
        }

        $concerts = [
            ['nom' => 'Nit de Rock', 'data_hora' => '2027-06-10 20:00:00', 'durada_minuts' => 120, 'tipus' => 'CONCERT'],
            ['nom' => 'Summer DJ', 'data_hora' => '2027-06-11 21:00:00', 'durada_minuts' => 90, 'tipus' => 'DJ_SET'],
            ['nom' => 'Nous Talents', 'data_hora' => '2027-06-12 18:00:00', 'durada_minuts' => 60, 'tipus' => 'SHOWCASE'],
            ['nom' => 'Acústic al Parc', 'data_hora' => '2027-06-13 19:00:00', 'durada_minuts' => 45, 'tipus' => 'ACUSTIC'],
            ['nom' => 'Rock de Nit', 'data_hora' => '2027-06-14 20:30:00', 'durada_minuts' => 110, 'tipus' => 'CONCERT'],
            ['nom' => 'Dance Session', 'data_hora' => '2027-06-15 22:00:00', 'durada_minuts' => 100, 'tipus' => 'DJ_SET'],
            ['nom' => 'Escenari Emergent', 'data_hora' => '2027-06-16 17:00:00', 'durada_minuts' => 75, 'tipus' => 'SHOWCASE'],
            ['nom' => 'Veus Acústiques', 'data_hora' => '2027-06-17 19:30:00', 'durada_minuts' => 50, 'tipus' => 'ACUSTIC'],
            ['nom' => 'Gran Concert', 'data_hora' => '2027-06-18 21:00:00', 'durada_minuts' => 130, 'tipus' => 'CONCERT'],
            ['nom' => 'Electronic Night', 'data_hora' => '2027-06-19 22:00:00', 'durada_minuts' => 120, 'tipus' => 'DJ_SET'],
            ['nom' => 'Descobertes Musicals', 'data_hora' => '2027-06-20 18:00:00', 'durada_minuts' => 60, 'tipus' => 'SHOWCASE'],
            ['nom' => 'Sessions Íntimes', 'data_hora' => '2027-06-21 19:00:00', 'durada_minuts' => 40, 'tipus' => 'ACUSTIC'],
            ['nom' => 'Rock Festival', 'data_hora' => '2027-06-22 20:00:00', 'durada_minuts' => 115, 'tipus' => 'CONCERT'],
            ['nom' => 'DJ Sunset', 'data_hora' => '2027-06-23 21:30:00', 'durada_minuts' => 90, 'tipus' => 'DJ_SET'],
            ['nom' => 'Talent en Directe', 'data_hora' => '2027-06-24 18:30:00', 'durada_minuts' => 70, 'tipus' => 'SHOWCASE'],
        ];

        foreach ($concerts as $i => $concert) {
            $concert['artista_id'] = $artistes[$i % $artistes->count()]->id;

            Concert::create($concert);
        }
    }
}
