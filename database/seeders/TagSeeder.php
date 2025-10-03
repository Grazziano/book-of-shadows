<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // DB Facade para inserção direta
use Illuminate\Support\Str;        // Para gerar o slug

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            // Gêneros de Terror
            'Slasher',
            'Terror Psicológico',
            'Gore',
            'Sobrenatural',
            'Found Footage',

            // Elementos e Criaturas
            'Zumbis',
            'Vampiros',
            'Fantasmas',
            'Bruxas',
            'Múmias',
            'Assassinos Em Série',

            // Temas e Datas
            'Clássicos do Terror',
            'Filmes de Halloween',
            'Decoração DIY',
            'Festa de Terror',
            'Lendas Brasileiras',

            // Ambientes
            'Cemitério',
            'Floresta Assombrada',
            'Hospício',
            'Casa Mal Assombrada',

            // Outros
            'Suspense',
            'Review de Filme',
            'Curiosidades',
            'Maquiagem de Halloween',
            'Folclore',
        ];

        $data = [];
        $timestamp = now(); // Obtém o timestamp atual para created_at e updated_at

        foreach ($tags as $tag) {
            $data[] = [
                'name'       => $tag,
                'slug'       => Str::slug($tag), // Garante um slug limpo para URLs
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        // Insere todos os dados de uma vez (melhor performance)
        DB::table('tags')->insert($data);
    }
}
