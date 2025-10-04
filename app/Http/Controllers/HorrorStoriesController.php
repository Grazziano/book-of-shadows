<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HorrorStoriesController extends Controller
{
    public function index()
    {
        // Buscar posts publicados do banco de dados filtrados por categorias de terror
        $stories = Post::with(['category', 'tags', 'user'])
            ->published()
            ->whereHas('category', function ($query) {
                $query->where('name', 'like', '%terror%')
                      ->orWhere('name', 'like', '%horror%')
                      ->orWhere('name', 'like', '%medo%')
                      ->orWhere('name', 'like', '%assombr%')
                      ->orWhere('name', 'like', '%conto%');
            })
            ->orderBy('published_at', 'desc')
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'author' => $post->user->name ?? 'Autor Desconhecido',
                    'summary' => $post->excerpt,
                    'content_preview' => substr(strip_tags($post->content), 0, 150) . '...',
                    'full_content' => $post->content,
                    'category' => $post->category->name ?? 'Sem Categoria',
                    'reading_time' => $this->calculateReadingTime($post->content),
                    'horror_level' => $this->getRandomHorrorLevel(),
                    'published_date' => $post->published_at->format('Y-m-d'),
                    'tags' => $post->tags->pluck('name')->toArray()
                ];
            });

        // Se não houver posts no banco, usar dados fictícios como fallback
        if ($stories->isEmpty()) {
            $stories = collect([
                [
                    'id' => 1,
                    'title' => 'A Casa no Final da Rua',
                    'author' => 'Edgar Allan Poe',
                    'summary' => 'Uma família se muda para uma casa aparentemente perfeita, mas logo descobrem que os antigos moradores nunca realmente partiram.',
                    'content_preview' => 'Era uma noite tempestuosa quando chegamos à casa. As janelas pareciam nos observar como olhos vazios...',
                    'full_content' => 'Era uma noite tempestuosa quando chegamos à casa. As janelas pareciam nos observar como olhos vazios, e o vento uivava através das frestas como lamentos de almas perdidas.\n\nA mudança havia sido necessária - meu trabalho exigia que nos relocássemos para aquela pequena cidade do interior. A casa estava disponível por um preço surpreendentemente baixo, o que deveria ter sido nosso primeiro sinal de alerta.\n\nNos primeiros dias, tudo parecia normal. As crianças brincavam no quintal, minha esposa organizava os móveis, e eu me concentrava em estabelecer meu novo escritório. Mas então começaram os ruídos.\n\nPrimeiro foram passos no andar de cima, quando todos estávamos na sala. Depois, portas que se fechavam sozinhas. Vozes sussurrando no meio da noite. Minha esposa insistia que eram apenas os sons de uma casa velha se acomodando, mas eu sabia que havia algo mais.\n\nFoi quando encontrei o diário escondido no sótão que tudo fez sentido. A família anterior - os Blackwood - havia desaparecido uma noite, deixando tudo para trás. O último registro no diário era aterrorizante: "Eles não nos deixam partir. Estão sempre observando, sempre esperando. Se alguém encontrar isto, fujam enquanto podem."\n\nMas já era tarde demais. Naquela noite, quando tentamos sair, as portas não abriram. As janelas estavam seladas por uma força invisível. E então os vimos - figuras sombrias nos corredores, rostos pálidos nas janelas, mãos espectrais que se estendiam das paredes.\n\nAgora entendo por que a casa estava tão barata. Não éramos os novos proprietários - éramos os próximos prisioneiros. E assim como os Blackwood, descobrimos que alguns lugares nunca deixam seus habitantes partirem.',
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
                    'full_content' => 'O espelho estava coberto por décadas de poeira, mas quando o limpei, vi algo que não era meu reflexo. Era uma face distorcida, com olhos que brilhavam com uma luz sobrenatural e um sorriso que revelava dentes afiados como navalhas.\n\nHerdei a casa da minha tia-avó, uma mulher excêntrica que sempre falava sobre "portais" e "outras dimensões". Pensei que fossem apenas delírios de uma mente senil, mas agora entendo que ela sabia exatamente do que estava falando.\n\nO espelho estava no sótão, coberto por um pano preto e cercado por velas derretidas e símbolos estranhos desenhados no chão. Deveria ter deixado como estava, mas a curiosidade foi mais forte.\n\nNa primeira noite após limpá-lo, acordei com a sensação de estar sendo observado. O espelho refletia meu quarto perfeitamente, exceto por uma diferença perturbadora - havia figuras sombrias em pé ao redor da minha cama, figuras que não existiam na realidade.\n\nA cada dia que passava, o reflexo se tornava mais distorcido. Minha imagem começou a se mover independentemente, fazendo gestos que eu não fazia, sorrindo quando eu estava sério. E então, uma noite, meu reflexo falou.\n\n"Você abriu a porta", disse com minha própria voz, mas com uma entonação que me gelou o sangue. "Agora eles podem passar."\n\nFoi quando percebi que o espelho não mostrava reflexos - mostrava outro mundo, um lugar onde criaturas antigas esperavam pacientemente por uma oportunidade de cruzar para nossa realidade. E eu, ingenuamente, havia lhes dado essa oportunidade.\n\nAgora eles estão aqui, caminhando pela minha casa, sussurrando em línguas mortas, esperando o momento certo para se revelarem ao mundo. E o pior de tudo é que meu reflexo continua lá, preso do outro lado, gritando silenciosamente por ajuda enquanto algo terrível usa meu corpo neste mundo.',
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
                    'full_content' => 'Todas as manhãs, a boneca estava em um lugar diferente. Seus olhos de vidro pareciam me seguir, e seu sorriso pintado havia se tornado mais sinistro a cada dia que passava.\n\nA boneca havia pertencido à minha avó, que morreu quando eu tinha apenas cinco anos. Minha mãe sempre disse que a vovó tinha uma ligação especial com aquela boneca, conversando com ela como se fosse uma pessoa real. Pensávamos que era apenas a solidão da velhice.\n\nQuando herdei a casa da família, encontrei a boneca no quarto da vovó, sentada em uma cadeira de balanço, vestida com um vestido vitoriano impecável. Seus cabelos loiros estavam perfeitamente penteados, e seus olhos azuis de vidro brilhavam com uma intensidade perturbadora.\n\nDecidi mantê-la como lembrança, colocando-a na estante da sala. Mas na manhã seguinte, ela estava na mesa da cozinha. Pensei que talvez eu a tivesse movido sem perceber, mas quando isso aconteceu novamente, e depois novamente, comecei a ficar preocupado.\n\nFoi na terceira noite que a ouvi sussurrar. Palavras em uma língua que não reconheci, mas que de alguma forma entendi. Ela estava contando segredos - segredos sobre a família, sobre mortes que foram encobertas, sobre rituais sombrios realizados no porão da casa.\n\n"Sua avó me contou tudo", sussurrou com uma voz infantil que ecoava na escuridão. "Sobre o que ela fez para me dar vida, sobre as almas que ela aprisionou dentro de mim."\n\nFoi então que entendi por que minha avó nunca se separava da boneca. Não era apenas uma companheira - era um receptáculo para algo muito mais sinistro. E agora, com minha avó morta, a boneca estava procurando uma nova anfitriã.\n\nTentei queimá-la, mas as chamas se recusaram a tocá-la. Tentei enterrá-la, mas ela sempre voltava. E a cada noite, sua voz fica mais forte, mais persuasiva, sussurrando promessas de poder e conhecimento em troca de uma simples coisa - minha alma.\n\nAgora entendo que não sou o dono da boneca. Ela é que me possui.',
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
            ]);

            return view('horror-stories.index', compact('stories'));
        }
        return view('horror-stories.index', compact('stories'));
    }

    public function show($id)
    {
        // Buscar post específico do banco de dados
        $post = Post::with(['category', 'tags', 'user'])
            ->published()
            ->findOrFail($id);

        $story = [
            'id' => $post->id,
            'title' => $post->title,
            'author' => $post->user->name ?? 'Autor Desconhecido',
            'summary' => $post->excerpt,
            'content_preview' => substr(strip_tags($post->content), 0, 150) . '...',
            'full_content' => $post->content,
            'category' => $post->category->name ?? 'Sem Categoria',
            'reading_time' => $this->calculateReadingTime($post->content),
            'horror_level' => $this->getRandomHorrorLevel(),
            'published_date' => $post->published_at->format('Y-m-d'),
            'tags' => $post->tags->pluck('name')->toArray()
        ];

        return view('horror-stories.show', compact('story'));
    }

    /**
     * Calcula o tempo de leitura baseado no conteúdo
     */
    private function calculateReadingTime($content)
    {
        $wordCount = str_word_count(strip_tags($content));
        $minutes = ceil($wordCount / 200); // Assumindo 200 palavras por minuto
        return $minutes . ' min';
    }

    /**
     * Retorna um nível de horror aleatório
     */
    private function getRandomHorrorLevel()
    {
        $levels = ['Baixo', 'Médio', 'Alto', 'Extremo'];
        return $levels[array_rand($levels)];
    }

    // Fallback para dados fictícios (removido para usar apenas dados do banco)
    private function getFictionalStories()
    {
        return [
            [
                'id' => 1,
                'title' => 'A Casa no Final da Rua',
                'author' => 'Edgar Allan Poe',
                'summary' => 'Uma família se muda para uma casa aparentemente perfeita, mas logo descobrem que os antigos moradores nunca realmente partiram.',
                'content_preview' => 'Era uma noite tempestuosa quando chegamos à casa. As janelas pareciam nos observar como olhos vazios...',
                'full_content' => 'Era uma noite tempestuosa quando chegamos à casa. As janelas pareciam nos observar como olhos vazios, e o vento uivava através das frestas como lamentos de almas perdidas.\n\nA mudança havia sido necessária - meu trabalho exigia que nos relocássemos para aquela pequena cidade do interior. A casa estava disponível por um preço surpreendentemente baixo, o que deveria ter sido nosso primeiro sinal de alerta.\n\nNos primeiros dias, tudo parecia normal. As crianças brincavam no quintal, minha esposa organizava os móveis, e eu me concentrava em estabelecer meu novo escritório. Mas então começaram os ruídos.\n\nPrimeiro foram passos no andar de cima, quando todos estávamos na sala. Depois, portas que se fechavam sozinhas. Vozes sussurrando no meio da noite. Minha esposa insistia que eram apenas os sons de uma casa velha se acomodando, mas eu sabia que havia algo mais.\n\nFoi quando encontrei o diário escondido no sótão que tudo fez sentido. A família anterior - os Blackwood - havia desaparecido uma noite, deixando tudo para trás. O último registro no diário era aterrorizante: "Eles não nos deixam partir. Estão sempre observando, sempre esperando. Se alguém encontrar isto, fujam enquanto podem."\n\nMas já era tarde demais. Naquela noite, quando tentamos sair, as portas não abriram. As janelas estavam seladas por uma força invisível. E então os vimos - figuras sombrias nos corredores, rostos pálidos nas janelas, mãos espectrais que se estendiam das paredes.\n\nAgora entendo por que a casa estava tão barata. Não éramos os novos proprietários - éramos os próximos prisioneiros. E assim como os Blackwood, descobrimos que alguns lugares nunca deixam seus habitantes partirem.',
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
                'full_content' => 'O espelho estava coberto por décadas de poeira, mas quando o limpei, vi algo que não era meu reflexo. Era uma face distorcida, com olhos que brilhavam com uma luz sobrenatural e um sorriso que revelava dentes afiados como navalhas.\n\nHerdei a casa da minha tia-avó, uma mulher excêntrica que sempre falava sobre "portais" e "outras dimensões". Pensei que fossem apenas delírios de uma mente senil, mas agora entendo que ela sabia exatamente do que estava falando.\n\nO espelho estava no sótão, coberto por um pano preto e cercado por velas derretidas e símbolos estranhos desenhados no chão. Deveria ter deixado como estava, mas a curiosidade foi mais forte.\n\nNa primeira noite após limpá-lo, acordei com a sensação de estar sendo observado. O espelho refletia meu quarto perfeitamente, exceto por uma diferença perturbadora - havia figuras sombrias em pé ao redor da minha cama, figuras que não existiam na realidade.\n\nA cada dia que passava, o reflexo se tornava mais distorcido. Minha imagem começou a se mover independentemente, fazendo gestos que eu não fazia, sorrindo quando eu estava sério. E então, uma noite, meu reflexo falou.\n\n"Você abriu a porta", disse com minha própria voz, mas com uma entonação que me gelou o sangue. "Agora eles podem passar."\n\nFoi quando percebi que o espelho não mostrava reflexos - mostrava outro mundo, um lugar onde criaturas antigas esperavam pacientemente por uma oportunidade de cruzar para nossa realidade. E eu, ingenuamente, havia lhes dado essa oportunidade.\n\nAgora eles estão aqui, caminhando pela minha casa, sussurrando em línguas mortas, esperando o momento certo para se revelarem ao mundo. E o pior de tudo é que meu reflexo continua lá, preso do outro lado, gritando silenciosamente por ajuda enquanto algo terrível usa meu corpo neste mundo.',
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
                'full_content' => 'Todas as manhãs, a boneca estava em um lugar diferente. Seus olhos de vidro pareciam me seguir, e seu sorriso pintado havia se tornado mais sinistro a cada dia que passava.\n\nA boneca havia pertencido à minha avó, que morreu quando eu tinha apenas cinco anos. Minha mãe sempre disse que a vovó tinha uma ligação especial com aquela boneca, conversando com ela como se fosse uma pessoa real. Pensávamos que era apenas a solidão da velhice.\n\nQuando herdei a casa da família, encontrei a boneca no quarto da vovó, sentada em uma cadeira de balanço, vestida com um vestido vitoriano impecável. Seus cabelos loiros estavam perfeitamente penteados, e seus olhos azuis de vidro brilhavam com uma intensidade perturbadora.\n\nDecidi mantê-la como lembrança, colocando-a na estante da sala. Mas na manhã seguinte, ela estava na mesa da cozinha. Pensei que talvez eu a tivesse movido sem perceber, mas quando isso aconteceu novamente, e depois novamente, comecei a ficar preocupado.\n\nFoi na terceira noite que a ouvi sussurrar. Palavras em uma língua que não reconheci, mas que de alguma forma entendi. Ela estava contando segredos - segredos sobre a família, sobre mortes que foram encobertas, sobre rituais sombrios realizados no porão da casa.\n\n"Sua avó me contou tudo", sussurrou com uma voz infantil que ecoava na escuridão. "Sobre o que ela fez para me dar vida, sobre as almas que ela aprisionou dentro de mim."\n\nFoi então que entendi por que minha avó nunca se separava da boneca. Não era apenas uma companheira - era um receptáculo para algo muito mais sinistro. E agora, com minha avó morta, a boneca estava procurando uma nova anfitriã.\n\nTentei queimá-la, mas as chamas se recusaram a tocá-la. Tentei enterrá-la, mas ela sempre voltava. E a cada noite, sua voz fica mais forte, mais persuasiva, sussurrando promessas de poder e conhecimento em troca de uma simples coisa - minha alma.\n\nAgora entendo que não sou o dono da boneca. Ela é que me possui.',
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
                'full_content' => 'Os galhos se moviam sem vento, e entre as folhas, vozes antigas chamavam meu nome com uma doçura que escondia uma malícia ancestral.\n\nEu sempre fui um caminhante noturno. Havia algo sobre a escuridão que me acalmava, o silêncio da noite que me permitia pensar com clareza. Mas aquela floresta era diferente. Mesmo durante o dia, havia uma qualidade sinistra sobre ela, como se as árvores guardassem segredos que não deveriam ser revelados.\n\nA primeira vez que ouvi os sussurros, pensei que fosse o vento. Mas não havia vento naquela noite. O ar estava parado, pesado, carregado de uma expectativa que fazia minha pele arrepiar. E então ouvi meu nome, sussurrado entre as folhas com uma familiaridade perturbadora.\n\n"Marcus... Marcus... venha mais perto..."\n\nDeveria ter fugido naquele momento. Deveria ter dado meia-volta e nunca mais voltado. Mas havia algo hipnótico naquelas vozes, algo que me puxava para dentro da floresta como um ímã invisível.\n\nA cada passo que dava, as vozes ficavam mais claras, mais distintas. Não era apenas uma voz - eram dezenas, talvez centenas, todas sussurrando em uníssono, todas me chamando pelo nome. E então comecei a reconhecê-las.\n\nMinha mãe, morta há dez anos. Meu irmão, que se perdeu nesta mesma floresta quando éramos crianças. Amigos que haviam partido, parentes esquecidos, todos me chamando das sombras entre as árvores.\n\n"Nós estamos esperando por você, Marcus. Há tanto tempo esperando..."\n\nFoi quando percebi que não conseguia mais encontrar o caminho de volta. As trilhas haviam desaparecido, as árvores pareciam ter se movido, criando um labirinto de troncos e galhos que me mantinha prisioneiro. E as vozes continuavam, mais insistentes agora, mais desesperadas.\n\n"Junte-se a nós, Marcus. Fique conosco para sempre..."\n\nAgora entendo que esta floresta é um cemitério de almas perdidas, um lugar onde os mortos chamam os vivos para se juntarem a eles na escuridão eterna. E eu, como tantos outros antes de mim, respondi ao chamado.\n\nSe você está lendo isto, é porque encontrou meu diário no limite da floresta. Não entre. Não importa o que ouça, não importa quem chame seu nome. Algumas vozes devem permanecer no silêncio.',
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
                'full_content' => 'O telefone tocou novamente. Minha mão tremeu ao atender, e a voz do outro lado era familiar demais - era minha própria voz, mas distorcida, como se viesse de muito longe.\n\n"Você não deveria ter atendido", disse a voz que era minha, mas não era. "Agora eles sabem onde você está."\n\nO telefone havia chegado com a casa. Um modelo antigo, de disco, que o antigo proprietário havia deixado para trás junto com alguns móveis. Pensei em removê-lo, mas havia algo charmoso sobre sua presença na sala de estar, um toque vintage que combinava com a decoração.\n\nAs ligações começaram na primeira semana. Sempre às 3:33 da manhã, sempre o mesmo toque estridente que me arrancava do sono. No início, eu simplesmente ignorava, deixando tocar até parar. Mas a curiosidade eventualmente venceu.\n\nA primeira vez que atendi, ouvi apenas respiração pesada e depois a linha morreu. Na segunda, uma voz sussurrou algo em uma língua que não reconheci. Mas foi na terceira ligação que tudo mudou.\n\n"Você está sozinho?", perguntou uma voz que soava exatamente como a minha. "Olhe pela janela."\n\nMeu sangue gelou. Caminhei até a janela da sala, as cortinas tremendo em minhas mãos. Lá fora, na rua escura, havia uma figura em pé sob o poste de luz. Uma figura que usava minhas roupas, que tinha minha postura, que era idêntica a mim em todos os aspectos.\n\nA figura acenou, e o telefone tocou novamente.\n\n"Você me vê?", perguntou minha própria voz através do fone. "Eu estou vindo para casa."\n\nTentei desligar o telefone da parede, mas ele continuou tocando. Tentei cortar o fio, mas as ligações persistiram. E a cada noite, às 3:33, a figura na rua ficava um pouco mais perto da minha porta.\n\n"Você não pode fugir de si mesmo", disse a voz na última ligação. "Eu sou você, e você é eu. E agora, finalmente, podemos ser um só."\n\nQuando olhei pela janela naquela noite, a figura havia desaparecido. Mas quando me virei, ela estava atrás de mim, sorrindo com meu próprio rosto.\n\n"Obrigado por atender", disse, estendendo uma mão que era idêntica à minha. "Agora podemos trocar de lugar."\n\nSe você encontrar este telefone, não atenda. Algumas ligações vêm de lugares onde os mortos ainda têm números de telefone.',
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
                'full_content' => 'Dia 30: As paredes estão sussurrando novamente. Não consigo mais distinguir o que é real e o que são os ecos de uma mente que está lentamente se despedaçando.\n\nEncontrei este diário na casa abandonada da Rua Elm, escondido em uma gaveta secreta no sótão. As páginas estão amareladas pelo tempo, mas a tinta ainda é legível. O que li me assombra até hoje.\n\nDia 1: Nos mudamos para a casa hoje. As crianças estão animadas, especialmente com o quarto no sótão. Sarah disse que ouviu risadas vindas de lá, mas quando subimos para verificar, estava vazio.\n\nDia 5: Coisas estranhas estão acontecendo. Objetos se movem sozinhos, portas se abrem durante a noite. Tom insiste que são apenas os sons de uma casa velha, mas eu sei que há algo mais.\n\nDia 12: As crianças começaram a falar com "amigos invisíveis". Elas dizem que são as crianças que moraram aqui antes, que nunca foram embora. Quando pergunto seus nomes, elas sussurram nomes que não reconheço.\n\nDia 18: Encontrei fotografias antigas no porão. Famílias que moraram aqui antes de nós. Todas desapareceram sem deixar rastros. Todas tinham a mesma expressão de terror nos olhos nas últimas fotos.\n\nDia 25: Tom não acredita em mim. Ele diz que estou imaginando coisas, que o estresse da mudança está me afetando. Mas eu sei o que vejo. Figuras sombrias nos corredores, sussurros nas paredes, mãos que se estendem das sombras.\n\nDia 28: As crianças desapareceram por três horas hoje. Quando as encontramos, estavam no sótão, sentadas em círculo, conversando com o ar. Elas disseram que estavam "aprendendo as regras" com os outros.\n\nDia 30: Não consigo mais negar. A casa está viva. Ela se alimenta das famílias que moram aqui, absorvendo suas essências até que se tornem parte dela. As crianças já estão mudando, seus olhos ficando vazios, suas vozes ecoando como se viessem de muito longe.\n\nTom finalmente viu. Ontem à noite, ele acordou e viu todas as famílias anteriores em pé ao redor de nossa cama, observando, esperando. Agora ele entende que não podemos partir. A casa não nos deixará.\n\nDia 31: Este será meu último registro. Posso sentir minha mente se fragmentando, minha identidade se dissolvendo. Em breve, serei apenas mais uma sombra nestas paredes, mais uma voz sussurrando para a próxima família.\n\nSe alguém encontrar este diário, fujam. Não tentem nos salvar. Já é tarde demais para nós. Mas talvez não seja tarde demais para vocês.\n\nA casa está esperando. Ela sempre está esperando.',
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
                'full_content' => 'Ela estava sempre atrás de mim, mesmo quando não havia luz para criar sombras. Uma mancha escura que se movia independentemente, crescendo mais densa e ameaçadora a cada dia que passava.\n\nTudo começou após o acidente. Eu estava dirigindo tarde da noite quando atropelei algo na estrada. Pensei que fosse um animal, mas quando saí para verificar, não havia nada lá. Apenas uma mancha escura no asfalto que parecia se mover sob a luz dos faróis.\n\nNos dias seguintes, comecei a notar que minha sombra estava... errada. Ela se movia um segundo depois de mim, como se estivesse atrasada. E às vezes, quando eu parava, ela continuava se movendo por alguns instantes antes de se alinhar comigo novamente.\n\nNo início, pensei que fosse paranoia, um efeito colateral do trauma do acidente. Mas então outras pessoas começaram a notar. Minha irmã comentou que minha sombra parecia "mais escura que o normal". Meu namorado disse que às vezes parecia que eu tinha duas sombras.\n\nFoi quando percebi que a sombra estava crescendo. Não apenas em tamanho, mas em densidade. Ela se tornava mais sólida, mais real a cada dia. E começou a se mover independentemente de mim.\n\nEu a via do canto do olho, deslizando pelas paredes quando eu não estava me movendo. Ela aparecia em espelhos quando eu não estava na frente deles. E então, uma noite, eu a vi em pé no canto do meu quarto, observando-me dormir.\n\nTentei fugir, mas ela sempre me encontrava. Mudei de cidade, mas ela apareceu no primeiro dia. Fiquei em hotéis, mas ela estava lá quando eu acordava. Não importava onde eu fosse, ela me seguia, sempre um passo atrás, sempre observando.\n\nFoi quando encontrei o diário da pessoa que eu atropelei naquela noite que tudo fez sentido. Ela havia escrito sobre sua própria sombra, sobre como ela havia se tornado independente após um ritual que deu errado. E na última entrada, ela escreveu: "A única maneira de se livrar dela é passá-la para outra pessoa. Perdoe-me pelo que estou prestes a fazer."\n\nAgora entendo. Ela se jogou na frente do meu carro propositalmente, transferindo sua maldição para mim. E agora a sombra é minha, crescendo mais forte a cada dia, sussurrando promessas sombrias em meu ouvido.\n\nEla quer que eu faça a mesma coisa. Que encontre outra pessoa, que passe a maldição adiante. Mas eu não posso. Não posso condenar outra pessoa a esta existência.\n\nEntão aqui estou, escrevendo isto como um aviso. Se você vir uma mulher jovem com uma sombra que se move independentemente, corra. Não olhe para trás, não tente ajudar. Porque algumas sombras não pertencem aos vivos.',
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
                'full_content' => 'Cada objeto sussurrava uma história diferente, mas todas terminavam em desespero. A loja de antiguidades que herdei do meu tio se revelou muito mais do que uma simples coleção de objetos velhos.\n\nMeu tio Aldrich sempre foi um homem excêntrico, obcecado por artefatos antigos e histórias sombrias. Quando morreu, deixou-me sua loja e uma carta enigmática: "Cuidado com o que você toca. Alguns objetos carregam mais do que apenas história."\n\nNo início, pensei que fosse apenas a excentricidade de um homem solitário. Mas na primeira noite que passei na loja, fazendo inventário, comecei a ouvir os sussurros.\n\nO espelho vitoriano no canto sussurrava sobre uma mulher que se olhou nele pela última vez antes de se enforcar. A boneca de porcelana contava sobre a criança que morreu de febre, agarrada a ela até o fim. O relógio de parede marcava não apenas as horas, mas os últimos momentos de vida de seu antigo dono.\n\nCada objeto carregava uma alma aprisionada, presa aos pertences que mais amavam ou que estavam com eles no momento da morte. E todas elas queriam a mesma coisa: liberdade.\n\n"Nos liberte", sussurravam em coro durante as noites. "Queime-nos, destrua-nos, nos deixe partir."\n\nMas eu não podia. Não apenas porque os objetos valiam uma fortuna, mas porque descobri algo terrível: meu tio não era apenas um colecionador. Ele era um aprisionador de almas.\n\nEncontrei seu diário secreto, detalhando rituais sombrios que ele realizava para capturar as essências dos mortos e prendê-las em objetos. Ele havia passado décadas construindo esta coleção macabra, alimentando-se da energia das almas aprisionadas para prolongar sua própria vida.\n\nE agora, com sua morte, as almas estavam se tornando mais agitadas, mais desesperadas. Elas sabiam que eu era sua única esperança de libertação. Mas também descobri que destruir os objetos não as libertaria - apenas as transferiria para mim.\n\nFoi quando entendi o verdadeiro legado do meu tio. Ele não me deixou uma loja de antiguidades. Ele me deixou uma prisão de almas, e agora eu era o carcereiro.\n\nAs almas sussurram promessas de poder, de conhecimento, de riqueza além da imaginação se eu continuar o trabalho dele. E a cada dia que passa, fica mais difícil resistir. Porque ser o guardião das almas significa nunca estar verdadeiramente sozinho.\n\nMas também significa nunca estar verdadeiramente vivo.\n\nSe você está lendo isto, é porque algo aconteceu comigo. Não entre na loja. Não toque em nada. E se ouvir sussurros, corra. Porque algumas coleções nunca devem ser herdadas.',
                'category' => 'Sobrenatural',
                'reading_time' => '22 min',
                'horror_level' => 'Alto',
                'published_date' => '2024-09-01',
                'tags' => ['Almas', 'Antiguidades', 'Coleção']
            ]
        ];
    }
}
