<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class UrbanLegendsController extends Controller
{
    public function index()
    {
        // Buscar posts publicados do banco de dados filtrados por categorias de lendas urbanas
        $posts = Post::with(['category', 'tags', 'user'])
            ->published()
            ->whereHas('category', function ($query) {
                $query->where('name', 'like', '%lenda%')
                      ->orWhere('name', 'like', '%urbana%')
                      ->orWhere('name', 'like', '%mito%')
                      ->orWhere('name', 'like', '%folclore%')
                      ->orWhere('name', 'like', '%mistério%');
            })
            ->orderBy('published_at', 'desc')
            ->get();

        // Mapear posts para o formato esperado pela view
        $legends = $posts->map(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'summary' => $post->excerpt,
                'image' => $post->featured_image ?? '/images/default-legend.jpg',
                'category' => $post->category->name ?? 'Sem Categoria',
                'origin' => 'Brasil', // Valor padrão
                'danger_level' => $this->getRandomDangerLevel()
            ];
        })->toArray();

        // Fallback para dados fictícios se não houver posts
        if (empty($legends)) {
            $legends = $this->getFictionalLegends();
        }

        return view('urban-legends.index', compact('legends'));
    }

    /**
     * Retorna um nível de perigo aleatório
     */
    private function getRandomDangerLevel()
    {
        $levels = ['Baixo', 'Médio', 'Alto', 'Extremo'];
        return $levels[array_rand($levels)];
    }

    /**
     * Dados fictícios de fallback
     */
    private function getFictionalLegends()
    {
        return [
            [
                'id' => 1,
                'title' => 'A Loira do Banheiro',
                'summary' => 'Uma das lendas urbanas mais conhecidas do Brasil, sobre o espírito de uma jovem que assombra banheiros escolares.',
                'image' => '/images/loira-banheiro.jpg',
                'category' => 'Fantasmas',
                'origin' => 'Brasil',
                'danger_level' => 'Médio'
            ],
            [
                'id' => 2,
                'title' => 'Homem do Saco',
                'summary' => 'Figura sinistra que sequestra crianças desobedientes, carregando-as em um saco pelas costas.',
                'image' => '/images/homem-saco.jpg',
                'category' => 'Sequestrador',
                'origin' => 'Brasil',
                'danger_level' => 'Alto'
            ],
            [
                'id' => 3,
                'title' => 'Chupa-Cabra',
                'summary' => 'Criatura misteriosa que ataca animais, especialmente cabras, sugando seu sangue.',
                'image' => '/images/chupa-cabra.jpg',
                'category' => 'Criatura',
                'origin' => 'América Latina',
                'danger_level' => 'Alto'
            ],
            [
                'id' => 4,
                'title' => 'Mulher de Branco',
                'summary' => 'Espírito de uma mulher vestida de branco que aparece em estradas desertas à noite.',
                'image' => '/images/mulher-branco.jpg',
                'category' => 'Fantasma',
                'origin' => 'Mundial',
                'danger_level' => 'Médio'
            ],
            [
                'id' => 5,
                'title' => 'Pé Grande',
                'summary' => 'Criatura gigantesca e peluda que habita florestas, deixando pegadas enormes.',
                'image' => '/images/pe-grande.jpg',
                'category' => 'Criatura',
                'origin' => 'América do Norte',
                'danger_level' => 'Baixo'
            ],
            [
                'id' => 6,
                'title' => 'Boneca Annabelle',
                'summary' => 'Boneca possuída por um espírito maligno que aterroriza quem se aproxima.',
                'image' => '/images/annabelle.jpg',
                'category' => 'Objeto Amaldiçoado',
                'origin' => 'Estados Unidos',
                'danger_level' => 'Alto'
            ]
        ];
    }

    public function show($id)
    {
        // Buscar post específico do banco de dados
        $post = Post::with(['category', 'tags', 'user'])
            ->published()
            ->findOrFail($id);

        $legend = [
            'id' => $post->id,
            'title' => $post->title,
            'summary' => $post->excerpt,
            'full_content' => $post->content,
            'image' => $post->featured_image ?? '/images/default-legend.jpg',
            'category' => $post->category->name ?? 'Sem Categoria',
            'origin' => 'Brasil', // Valor padrão
            'danger_level' => $this->getRandomDangerLevel(),
            'published_date' => $post->published_at->format('Y-m-d'),
            'tags' => $post->tags->pluck('name')->toArray()
        ];

        return view('urban-legends.show', compact('legend'));
    }
}
