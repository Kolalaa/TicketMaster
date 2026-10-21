<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artista;

class ArtistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $artistes = [
            [
                'nom' => 'Rosalía',
                'pais' => 'Espanya',
                'bio' => 'Cantant i compositora catalana.',
                'imatge_url' => null,
                'actiu' => true,
            ],
            [
                'nom' => 'Bad Bunny',
                'pais' => 'Puerto Rico',
                'bio' => 'Cantant de música urbana.',
                'imatge_url' => null,
                'actiu' => true,
            ],
            [
                'nom' => 'Dua Lipa',
                'pais' => 'Regne Unit',
                'bio' => 'Cantant de pop.',
                'imatge_url' => null,
                'actiu' => true,
            ],
            [
                'nom' => 'The Weeknd',
                'pais' => 'Canadà',
                'bio' => 'Cantant de R&B i pop.',
                'imatge_url' => null,
                'actiu' => true,
            ],
            [
                'nom' => 'Estopa',
                'pais' => 'Espanya',
                'bio' => 'Duo musical de Cornellà.',
                'imatge_url' => null,
                'actiu' => true,
            ],
            [
                'nom' => 'Aitana',
                'pais' => 'Espanya',
                'bio' => 'Cantant pop.',
                'imatge_url' => null,
                'actiu' => true,
            ],
            [
                'nom' => 'Coldplay',
                'pais' => 'Regne Unit',
                'bio' => 'Grup de pop rock.',
                'imatge_url' => null,
                'actiu' => false,
            ],
            [
                'nom' => 'Imagine Dragons',
                'pais' => 'Estats Units',
                'bio' => 'Grup de pop rock alternatiu.',
                'imatge_url' => null,
                'actiu' => false,
            ],
        ];

        foreach ($artistes as $artista) {
            Artista::create($artista);
        }
    }
}
