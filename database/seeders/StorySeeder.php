<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('stories')->insert([
            [
                'title' => 'O Sussurro no Corredor',
                'author' => 'Lúcia Andrade',
                'excerpt' => 'Toda noite, o mesmo som vinha do corredor — um sussurro chamando pelo nome de alguém que já não morava ali.',
                'content' => 'Depois que a família se mudou para a antiga casa, os sussurros começaram. Primeiro, leves e distantes. Depois, cada vez mais próximos. Lúcia percebeu tarde demais que a voz chamava o nome do filho que nunca teve.',
                'featured_image' => 'stories/sussurro-corredor.jpg',
                'category' => 'terror',
                'horror_level' => 4,
                'status' => 'published',
                'user_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Sombras na Janela',
                'author' => 'Rafael Monteiro',
                'excerpt' => 'Às três da manhã, algo sempre olhava de volta pela janela do quarto.',
                'content' => 'Rafael jurava ver o reflexo de alguém atrás de si quando fechava as cortinas. Um dia decidiu abrir a janela e olhar para fora — o reflexo continuou olhando, do outro lado do vidro.',
                'featured_image' => 'stories/sombras-janela.jpg',
                'category' => 'sobrenatural',
                'horror_level' => 5,
                'status' => 'published',
                'user_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'A Porta Vermelha',
                'author' => 'Camila Borges',
                'excerpt' => 'Ninguém na vila ousava abrir a porta vermelha no final da rua.',
                'content' => 'Camila sempre foi curiosa demais. Quando finalmente empurrou a porta, encontrou um quarto sem janelas e um espelho enorme. No reflexo, viu-se sorrindo — mas não era ela quem controlava o sorriso.',
                'featured_image' => 'stories/porta-vermelha.jpg',
                'category' => 'psicologico',
                'horror_level' => 3,
                'status' => 'published',
                'user_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'O Hospício Abandonado',
                'author' => 'Eduardo Siqueira',
                'excerpt' => 'Alguns lugares esquecem de morrer — e continuam chamando por ajuda.',
                'content' => 'Quando a equipe de exploradores entrou no antigo hospício, tudo parecia vazio. Mas as câmeras gravaram vozes pedindo socorro... e ninguém da equipe se lembra de ter falado.',
                'featured_image' => 'stories/hospicio-abandonado.jpg',
                'category' => 'horror',
                'horror_level' => 5,
                'status' => 'published',
                'user_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'O Retrato Esquecido',
                'author' => 'Mariana Tavares',
                'excerpt' => 'Toda vez que alguém olhava o retrato, o rosto parecia um pouco diferente.',
                'content' => 'A pintura antiga mostrava uma mulher de expressão serena. Mas, conforme os dias passavam, o sorriso se tornava mais largo, e os olhos, mais vivos. Até que uma noite, o retrato estava vazio — e Mariana não foi mais vista.',
                'featured_image' => 'stories/retrato-esquecido.jpg',
                'category' => 'gotico',
                'horror_level' => 4,
                'status' => 'published',
                'user_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'O Sétimo Andar',
                'author' => 'Henrique Duarte',
                'excerpt' => 'O elevador nunca devia parar no sétimo andar, mas naquela noite, as portas se abriram.',
                'content' => 'Henrique estava sozinho no prédio quando o elevador parou no andar inexistente. As luzes piscavam, e o corredor cheirava a ferrugem e sangue. Quando voltou ao térreo, o painel mostrava “8” — mas só havia sete andares.',
                'featured_image' => 'stories/setimo-andar.jpg',
                'category' => 'suspense',
                'horror_level' => 3,
                'status' => 'published',
                'user_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
