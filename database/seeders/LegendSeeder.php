<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LegendSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('legends')->insert([
            [
                'title' => 'A Loira do Banheiro',
                'author' => 'Anônimo',
                'location' => 'Escolas do Brasil',
                'category' => 'urbana',
                'danger_level' => 3,
                'content' => 'Diz a lenda que uma jovem estudante morreu tragicamente no banheiro da escola. Desde então, seu espírito aparece quando alguém chama seu nome três vezes diante do espelho.',
                'moral' => 'Brincadeiras inocentes podem invocar o que não deve ser despertado.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'O Corpo-Seco',
                'author' => 'Tradição popular',
                'location' => 'Interior do Brasil',
                'category' => 'folclorica',
                'danger_level' => 4,
                'content' => 'Conta-se que o Corpo-Seco era um homem tão cruel que nem a terra quis aceitá-lo. Hoje vaga entre o mundo dos vivos e dos mortos, atacando viajantes solitários.',
                'moral' => 'O mal que se faz em vida ecoa até depois da morte.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'A Noiva de Preto',
                'author' => 'Anônimo',
                'location' => 'Cemitério de São Paulo',
                'category' => 'sobrenatural',
                'danger_level' => 5,
                'content' => 'Dizem que uma mulher vestida de preto aparece nas madrugadas frias, chorando sobre os túmulos. Quem tenta consolá-la, desaparece misteriosamente.',
                'moral' => 'Nem todos os lamentos pedem consolo.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'O Espelho da Loucura',
                'author' => 'Marta Nogueira',
                'location' => 'Casa abandonada em Minas Gerais',
                'category' => 'psicologica',
                'danger_level' => 2,
                'content' => 'Uma mulher solitária acreditava que o espelho de seu quarto mostrava mais do que reflexos. Certa noite, viu seu próprio corpo sair do vidro e tomar seu lugar.',
                'moral' => 'Às vezes, o verdadeiro inimigo está dentro de nós.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'O Mosteiro Gótico',
                'author' => 'Henrique Vasconcellos',
                'location' => 'Serra Gaúcha, RS',
                'category' => 'gotica',
                'danger_level' => 4,
                'content' => 'Nas ruínas de um antigo mosteiro, monges amaldiçoados ainda rezam à meia-noite, tentando expiar pecados que o inferno não perdoou.',
                'moral' => 'Nem toda fé salva — algumas aprisionam.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
