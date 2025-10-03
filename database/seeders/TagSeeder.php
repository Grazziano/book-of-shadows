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
            'Horror Cósmico',
            'Terror Lovecraftiano',
            'Terror Corporal',
            'Terror Espacial',
            'Terror Pós-Apocalíptico',
            'Terror Infantil',
            'Terror Religioso',
            'Horror Folk',
            'Thriller Psicológico',

            // Elementos e Criaturas
            'Zumbis',
            'Vampiros',
            'Lobisomens',
            'Fantasmas',
            'Bruxas',
            'Múmias',
            'Assassinos Em Série',
            'Demônios',
            'Criaturas Marinhas',
            'Bonecas Assombradas',
            'Poltergeist',
            'Entidades',
            'Clowns Assustadores',
            'Monstros',
            'Alienígenas Hostis',
            'Criaturas da Noite',

            // Temas e Datas
            'Clássicos do Terror',
            'Filmes de Halloween',
            'Decoração DIY',
            'Festa de Terror',
            'Lendas Brasileiras',
            'Contos Urbanos',
            'Creepypastas',
            'Histórias Reais de Terror',
            'Ocultismo',
            'Magia Negra',
            'Rituais',
            'Cultos',
            'Apocalipse Zumbi',
            'Dia das Bruxas',
            'Sexta-feira 13',
            'Dia dos Mortos',

            // Ambientes
            'Cemitério',
            'Floresta Assombrada',
            'Hospício',
            'Casa Mal Assombrada',
            'Cabana na Floresta',
            'Mansão Abandonada',
            'Escola Abandonada',
            'Hotéis Assombrados',
            'Subterrâneos e Túneis',
            'Vilarejos Assustadores',

            // Outros
            'Suspense',
            'Review de Filme',
            'Curiosidades',
            'Maquiagem de Halloween',
            'Folclore',
            'Criptídeos',
            'True Crime',
            'Lendas Urbanas',
            'Mistérios Não Resolvidos',
            'Experiências Paranormais',
            'Teorias da Conspiração',
            'Serial Killers Reais',
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
