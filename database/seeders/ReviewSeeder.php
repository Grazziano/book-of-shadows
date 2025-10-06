<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reviews = [
            // Filmes
            [
                'title' => 'Hereditário',
                'content' => 'Hereditário é uma obra-prima do horror psicológico que explora os traumas familiares de forma visceral e perturbadora. Ari Aster constrói uma atmosfera de tensão crescente que culmina em momentos de puro terror. A performance de Toni Collette é absolutamente fenomenal, transmitindo o desespero e a loucura de uma mãe em luto. O filme utiliza elementos sobrenaturais de forma inteligente, sempre mantendo a ambiguidade sobre o que é real e o que é produto da mente perturbada dos personagens. A cinematografia é impecável, com enquadramentos que criam uma sensação constante de desconforto. Este é um filme que fica na sua mente por dias após assistir.',
                'summary' => 'Um drama familiar se transforma em pesadelo sobrenatural quando segredos sombrios da família Graham vêm à tona após a morte da avó.',
                'type' => 'movie',
                'author_director' => 'Ari Aster',
                'genre' => 'Horror Psicológico',
                'release_year' => 2018,
                'rating' => 9.2,
                'featured' => true,
                'status' => 'published'
            ],
            [
                'title' => 'Midsommar',
                'content' => 'Midsommar é uma experiência cinematográfica única que subverte as convenções do horror ao ambientar seus terrores em plena luz do dia. Ari Aster mais uma vez demonstra sua maestria em criar atmosferas perturbadoras. O filme explora temas de relacionamentos tóxicos e rituais pagãos de forma brilhante. A direção de arte é espetacular, criando um mundo visualmente deslumbrante mas profundamente perturbador. Florence Pugh entrega uma performance poderosa como Dani, uma mulher lidando com trauma e luto. O filme é lento e contemplativo, construindo tensão através de detalhes sutis e simbolismo rico.',
                'summary' => 'Um grupo de amigos viaja para um festival de verão na Suécia, mas descobrem que participaram de um ritual pagão terrível.',
                'type' => 'movie',
                'author_director' => 'Ari Aster',
                'genre' => 'Horror Folk',
                'release_year' => 2019,
                'rating' => 8.8,
                'featured' => true,
                'status' => 'published'
            ],
            [
                'title' => 'O Farol',
                'content' => 'O Farol é uma obra cinematográfica hipnotizante que combina elementos de horror psicológico com drama existencial. Robert Eggers cria uma atmosfera claustrofóbica e opressiva que espelha a deterioração mental dos protagonistas. As performances de Robert Pattinson e Willem Dafoe são absolutamente magníficas, criando uma dinâmica complexa entre os dois faroleiros isolados. A cinematografia em preto e branco é deslumbrante, capturando a brutalidade do oceano e a solidão do farol. O filme é uma meditação sobre masculinidade, isolamento e loucura, com diálogos que misturam poesia com vulgaridade de forma brilhante.',
                'summary' => 'Dois faroleiros ficam presos em uma ilha remota e começam a perder a sanidade mental.',
                'type' => 'movie',
                'author_director' => 'Robert Eggers',
                'genre' => 'Horror Psicológico',
                'release_year' => 2019,
                'rating' => 8.5,
                'featured' => false,
                'status' => 'published'
            ],
            
            // Livros
            [
                'title' => 'O Exorcista',
                'content' => 'O Exorcista de William Peter Blatty é uma obra fundamental do horror literário que transcende o gênero para explorar questões profundas sobre fé, bem e mal. A história de Regan MacNeil, uma menina de 12 anos possuída por uma entidade demoníaca, é contada com uma prosa elegante e perturbadora. Blatty constrói a tensão gradualmente, começando com eventos aparentemente inexplicáveis até chegar aos momentos mais intensos de possessão. O autor demonstra um conhecimento profundo de teologia e psicologia, criando uma narrativa que questiona os limites entre o científico e o sobrenatural. Os personagens são bem desenvolvidos, especialmente o Padre Karras, cuja crise de fé espelha os dilemas do leitor.',
                'summary' => 'Uma menina de 12 anos é possuída por uma entidade demoníaca, levando sua mãe a buscar ajuda de dois padres para um exorcismo.',
                'type' => 'book',
                'author_director' => 'William Peter Blatty',
                'genre' => 'Horror Sobrenatural',
                'release_year' => 1971,
                'rating' => 9.0,
                'featured' => true,
                'status' => 'published'
            ],
            [
                'title' => 'Drácula',
                'content' => 'Drácula de Bram Stoker é o romance gótico definitivo que estabeleceu os fundamentos do vampirismo na literatura moderna. Stoker cria uma atmosfera vitoriana densa e opressiva, utilizando múltiplas perspectivas narrativas através de diários e cartas. O Conde Drácula é um antagonista icônico, representando medos ancestrais sobre morte, sexualidade e o desconhecido. A prosa de Stoker é rica em detalhes atmosféricos, transportando o leitor para os castelos sombrios da Transilvânia e as ruas nebulosas de Londres. O romance explora temas de modernidade versus tradição, civilização versus selvageria, de forma magistral.',
                'summary' => 'Jonathan Harker viaja à Transilvânia para encontrar o misterioso Conde Drácula, desencadeando uma batalha épica entre o bem e o mal.',
                'type' => 'book',
                'author_director' => 'Bram Stoker',
                'genre' => 'Horror Gótico',
                'release_year' => 1897,
                'rating' => 8.7,
                'featured' => false,
                'status' => 'published'
            ],
            
            // Séries
            [
                'title' => 'The Haunting of Hill House',
                'content' => 'The Haunting of Hill House é uma obra-prima da televisão que redefine o horror para o meio seriado. Mike Flanagan adapta livremente o romance de Shirley Jackson, criando uma narrativa que funciona tanto como horror sobrenatural quanto como drama familiar profundo. A série utiliza flashbacks de forma brilhante, revelando gradualmente os traumas que assombram a família Crain. Cada episódio é uma pequena obra de arte, com destaque para o episódio "Two Storms", filmado em planos-sequência impressionantes. As performances do elenco são uniformemente excelentes, especialmente Carla Gugino e Michiel Huisman. A série consegue ser genuinamente assustadora enquanto explora temas universais de perda, luto e família.',
                'summary' => 'A família Crain confronta memórias assombradas de sua infância na Hill House, a casa mais assombrada do país.',
                'type' => 'series',
                'author_director' => 'Mike Flanagan',
                'genre' => 'Horror Sobrenatural',
                'release_year' => 2018,
                'rating' => 9.5,
                'featured' => true,
                'status' => 'published'
            ],
            [
                'title' => 'True Detective (1ª Temporada)',
                'content' => 'A primeira temporada de True Detective é uma obra-prima do suspense televisivo que combina investigação criminal com horror cósmico. Nic Pizzolatto cria uma narrativa não-linear fascinante que explora a natureza do mal e da obsessão. As performances de Matthew McConaughey e Woody Harrelson são absolutamente fenomenais, criando uma dinâmica complexa entre dois detetives com filosofias de vida opostas. A direção de Cary Joji Fukunaga é cinematográfica, com uma paleta de cores e enquadramentos que criam uma atmosfera única do sul americano. A série explora temas filosóficos profundos sobre tempo, consciência e niilismo de forma inteligente e perturbadora.',
                'summary' => 'Dois detetives investigam uma série de assassinatos rituais na Louisiana rural ao longo de 17 anos.',
                'type' => 'series',
                'author_director' => 'Nic Pizzolatto',
                'genre' => 'Crime/Horror',
                'release_year' => 2014,
                'rating' => 9.3,
                'featured' => false,
                'status' => 'published'
            ]
        ];

        foreach ($reviews as $reviewData) {
            Review::create($reviewData);
        }
    }
}
