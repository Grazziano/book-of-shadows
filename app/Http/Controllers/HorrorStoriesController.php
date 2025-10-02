<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HorrorStoriesController extends Controller
{
    public function index()
    {
        // Dados fictícios de contos de terror para demonstração
        $stories = [
            [
                'id' => 1,
                'title' => 'A Casa no Final da Rua',
                'author' => 'Edgar Allan Poe',
                'summary' => 'Uma família se muda para uma casa aparentemente perfeita, mas logo descobrem que os antigos moradores nunca realmente partiram.',
                'content_preview' => 'Era uma noite tempestuosa quando chegamos à casa. As janelas pareciam nos observar como olhos vazios...',
                'category' => 'Fantasmas',
                'reading_time' => '15 min',
                'horror_level' => 'Alto',
                'published_date' => '2024-10-15',
                'tags' => ['Casa Assombrada', 'Família', 'Mistério']
            ],
            [
                'id' => 2,
                'title' => 'O Espelho do Sótão',
                'author' => 'H.P. Lovecraft',
                'summary' => 'Um antigo espelho encontrado no sótão revela reflexos que não deveriam existir, mostrando horrores de outras dimensões.',
                'content_preview' => 'O espelho estava coberto por décadas de poeira, mas quando o limpei, vi algo que não era meu reflexo...',
                'category' => 'Sobrenatural',
                'reading_time' => '12 min',
                'horror_level' => 'Extremo',
                'published_date' => '2024-10-10',
                'tags' => ['Espelho', 'Dimensões', 'Terror Psicológico']
            ],
            [
                'id' => 3,
                'title' => 'A Boneca de Porcelana',
                'author' => 'Mary Shelley',
                'summary' => 'Uma boneca de porcelana herdada da avó começa a se mover durante a noite, sussurrando segredos sombrios do passado.',
                'content_preview' => 'Todas as manhãs, a boneca estava em um lugar diferente. Seus olhos de vidro pareciam me seguir...',
                'category' => 'Objetos Amaldiçoados',
                'reading_time' => '18 min',
                'horror_level' => 'Médio',
                'published_date' => '2024-10-05',
                'tags' => ['Boneca', 'Herança', 'Maldição']
            ],
            [
                'id' => 4,
                'title' => 'O Sussurro na Floresta',
                'author' => 'Bram Stoker',
                'summary' => 'Caminhantes noturnos relatam ouvir sussurros vindos das árvores, chamando-os para se perderem para sempre na escuridão.',
                'content_preview' => 'Os galhos se moviam sem vento, e entre as folhas, vozes antigas chamavam meu nome...',
                'category' => 'Natureza Sombria',
                'reading_time' => '20 min',
                'horror_level' => 'Alto',
                'published_date' => '2024-09-28',
                'tags' => ['Floresta', 'Sussurros', 'Perdição']
            ],
            [
                'id' => 5,
                'title' => 'A Última Ligação',
                'author' => 'Stephen King',
                'summary' => 'Um telefone antigo toca todas as noites às 3:33, e quem atende recebe uma mensagem aterrorizante do além.',
                'content_preview' => 'O telefone tocou novamente. Minha mão tremeu ao atender, e a voz do outro lado era familiar demais...',
                'category' => 'Terror Moderno',
                'reading_time' => '10 min',
                'horror_level' => 'Médio',
                'published_date' => '2024-09-20',
                'tags' => ['Telefone', 'Hora Morta', 'Comunicação']
            ],
            [
                'id' => 6,
                'title' => 'O Diário Perdido',
                'author' => 'Shirley Jackson',
                'summary' => 'Um diário encontrado em uma casa abandonada revela os últimos dias de uma família que desapareceu misteriosamente.',
                'content_preview' => 'Dia 30: As paredes estão sussurrando novamente. Não consigo mais distinguir o que é real...',
                'category' => 'Mistério',
                'reading_time' => '25 min',
                'horror_level' => 'Alto',
                'published_date' => '2024-09-15',
                'tags' => ['Diário', 'Desaparecimento', 'Casa Abandonada']
            ],
            [
                'id' => 7,
                'title' => 'A Sombra que Segue',
                'author' => 'Clive Barker',
                'summary' => 'Uma sombra sem dono começa a seguir uma jovem, crescendo mais escura e ameaçadora a cada dia que passa.',
                'content_preview' => 'Ela estava sempre atrás de mim, mesmo quando não havia luz para criar sombras...',
                'category' => 'Terror Psicológico',
                'reading_time' => '14 min',
                'horror_level' => 'Extremo',
                'published_date' => '2024-09-08',
                'tags' => ['Sombra', 'Perseguição', 'Paranoia']
            ],
            [
                'id' => 8,
                'title' => 'O Colecionador de Almas',
                'author' => 'Anne Rice',
                'summary' => 'Um antiquário descobre que os objetos em sua loja carregam as almas de seus antigos donos, todas clamando por liberdade.',
                'content_preview' => 'Cada objeto sussurrava uma história diferente, mas todas terminavam em desespero...',
                'category' => 'Sobrenatural',
                'reading_time' => '22 min',
                'horror_level' => 'Alto',
                'published_date' => '2024-09-01',
                'tags' => ['Almas', 'Antiguidades', 'Coleção']
            ]
        ];

        return view('horror-stories.index', compact('stories'));
    }
}
