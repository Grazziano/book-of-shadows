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
        ];

        DB::table('categories')->insert($categories);
    }
}
