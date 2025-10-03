<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $timestamp = now();

        $categories = [
            [
                'name' => 'Lendas Urbanas',
                'description' => 'Histórias assustadoras que "poderiam ser reais" e folclore moderno.',
                'slug' => Str::slug('Lendas Urbanas'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'Contos Macabros',
                'description' => 'Ficção de terror, desde contos curtos a histórias mais elaboradas.',
                'slug' => Str::slug('Contos Macabros'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'Críticas & Recomendações',
                'description' => 'Análise de filmes, séries, livros e jogos de terror.',
                'slug' => Str::slug('Críticas & Recomendações'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'Decoração & DIY',
                'description' => 'Tutoriais de decoração de Halloween, fantasias e receitas temáticas.',
                'slug' => Str::slug('Decoração & DIY'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'História do Terror',
                'description' => 'Artigos sobre a origem do Halloween, mitos e ícones do gênero (vampiros, lobisomens, etc.).',
                'slug' => Str::slug('História do Terror'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'Lugares Assombrados',
                'description' => 'Relatos e investigações de locais mal-assombrados famosos no Brasil e no mundo.',
                'slug' => Str::slug('Lugares Assombrados'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],

            // NOVAS CATEGORIAS
            [
                'name' => 'Folclore Brasileiro',
                'description' => 'Lendas e criaturas do Brasil como Saci, Curupira, Iara e outros mitos regionais.',
                'slug' => Str::slug('Folclore Brasileiro'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'Folclore Mundial',
                'description' => 'Histórias e criaturas lendárias de outras culturas como Baba Yaga, Krampus e Wendigo.',
                'slug' => Str::slug('Folclore Mundial'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'Experiências Paranormais',
                'description' => 'Relatos reais de pessoas que viveram situações inexplicáveis e assustadoras.',
                'slug' => Str::slug('Experiências Paranormais'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'True Crime',
                'description' => 'Casos criminais reais com conexão ao terror, mistério e serial killers.',
                'slug' => Str::slug('True Crime'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'Datas Especiais',
                'description' => 'Conteúdos relacionados ao Dia das Bruxas, Sexta-feira 13 e Dia dos Mortos.',
                'slug' => Str::slug('Datas Especiais'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'Criaturas Sobrenaturais',
                'description' => 'Exploração de monstros, fantasmas, vampiros, lobisomens, múmias e mais.',
                'slug' => Str::slug('Criaturas Sobrenaturais'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'Creepypastas',
                'description' => 'Lendas modernas da internet e histórias virais de terror.',
                'slug' => Str::slug('Creepypastas'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
            [
                'name' => 'Mistérios Não Resolvidos',
                'description' => 'Casos estranhos e sem explicação, do paranormal ao crime.',
                'slug' => Str::slug('Mistérios Não Resolvidos'),
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ],
        ];

        DB::table('categories')->insert($categories);
    }
}
