<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categories')->insert([
            [
                'name' => 'Lendas Urbanas',
                'description' => 'Histórias assustadoras que "poderiam ser reais" e folclore moderno.',
            ],
            [
                'name' => 'Contos Macabros',
                'description' => 'Ficção de terror, desde contos curtos a histórias mais elaboradas.',
            ],
            [
                'name' => 'Críticas & Recomendações',
                'description' => 'Análise de filmes, séries, livros e jogos de terror.',
            ],
            [
                'name' => 'Decoração & DIY',
                'description' => 'Tutoriais de decoração de Halloween, fantasias e receitas temáticas.',
            ],
            [
                'name' => 'História do Terror',
                'description' => 'Artigos sobre a origem do Halloween, mitos e ícones do gênero (vampiros, lobisomens, etc.).',
            ],
            [
                'name' => 'Lugares Assombrados',
                'description' => 'Relatos e investigações de locais mal-assombrados famosos no Brasil e no mundo.',
            ],
        ]);
    }
}
