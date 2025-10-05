<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title' => 'Mistérios do Cemitério de São Miguel',
                'slug' => Str::slug('Mistérios do Cemitério de São Miguel'),
                'excerpt' => 'Moradores dizem ouvir vozes e passos à meia-noite, mas os túmulos estão sempre vazios.',
                'content' => 'O antigo cemitério de São Miguel é conhecido por suas histórias macabras. Durante décadas, visitantes relataram ver vultos e ouvir coros vindos de dentro das capelas. Arqueólogos descobriram recentemente criptas datadas de antes da fundação da cidade.',
                'featured_image' => 'posts/cemiterio-sao-miguel.jpg',
                'status' => 'published',
                'category_id' => 1,
                'user_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Lendas Urbanas que Assombram as Capitais Brasileiras',
                'slug' => Str::slug('Lendas Urbanas que Assombram as Capitais Brasileiras'),
                'excerpt' => 'Do Norte ao Sul, cada cidade tem sua história que ninguém ousa confirmar.',
                'content' => 'De Porto Alegre a Manaus, lendas urbanas persistem como ecos de medo coletivo. A loira do banheiro, o homem do saco e a mulher de branco são apenas algumas das figuras que surgem na escuridão das madrugadas urbanas.',
                'featured_image' => 'posts/lendas-urbanas-brasil.jpg',
                'status' => 'published',
                'category_id' => 2,
                'user_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Casas Mal-Assombradas: Verdade ou Ficção?',
                'slug' => Str::slug('Casas Mal-Assombradas: Verdade ou Ficção?'),
                'excerpt' => 'Exploramos os locais mais temidos do país e o que há por trás das histórias.',
                'content' => 'Pesquisadores e curiosos têm visitado residências conhecidas por atividades paranormais. Sons inexplicáveis, portas que batem sozinhas e sombras que se movem contra a luz — fenômenos que desafiam a razão.',
                'featured_image' => 'posts/casas-mal-assombradas.jpg',
                'status' => 'published',
                'category_id' => 3,
                'user_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Rituais Proibidos: Ecos de um Passado Oculto',
                'slug' => Str::slug('Rituais Proibidos: Ecos de um Passado Oculto'),
                'excerpt' => 'Documentos antigos revelam cerimônias realizadas à meia-noite nas florestas do sul do país.',
                'content' => 'Manuscritos encontrados em 1923 descrevem rituais antigos que prometiam contato com o além. Muitos acreditam que tais práticas continuam vivas, passadas secretamente de geração em geração.',
                'featured_image' => 'posts/rituais-proibidos.jpg',
                'status' => 'published',
                'category_id' => 4,
                'user_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'As Vozes do Porão',
                'slug' => Str::slug('As Vozes do Porão'),
                'excerpt' => 'Uma investigação sobre sons misteriosos vindos de um casarão abandonado no interior.',
                'content' => 'O casarão dos Montenegro, fechado desde 1958, voltou a chamar atenção de curiosos. Moradores afirmam ouvir choros e risadas infantis vindo do porão — mesmo após as janelas terem sido lacradas por completo.',
                'featured_image' => 'posts/vozes-do-porao.jpg',
                'status' => 'published',
                'category_id' => 5,
                'user_id' => 1,
                'published_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
