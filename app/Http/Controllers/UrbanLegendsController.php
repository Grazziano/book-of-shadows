<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Legend;

class UrbanLegendsController extends Controller
{
    public function index()
    {
        // Buscar lendas urbanas publicadas da tabela legends
        $legendsData = Legend::orderBy('created_at', 'desc')->get();

        // Mapear lendas para o formato esperado pela view
        $legends = $legendsData->map(function ($legend) {
            return [
                'id' => $legend->id,
                'title' => $legend->title,
                'summary' => $legend->content ? substr(strip_tags($legend->content), 0, 150) . '...' : 'Sem resumo disponível',
                'image' => '/images/default-legend.jpg', // Imagem padrão
                'category' => $legend->category,
                'origin' => $legend->location ?? 'Brasil',
                'danger_level' => $legend->danger_level
            ];
        })->toArray();

        // Fallback para dados fictícios se não houver lendas
        if (empty($legends)) {
            $legends = $this->getFictionalLegends();
        }

        return view('urban-legends.index', compact('legends'));
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
        // Buscar lenda específica do banco de dados
        $legends = Legend::with(['category', 'tags', 'user'])
            ->published()
            ->findOrFail($id);

        $legend = [
            'id' => $legends->id,
            'title' => $legends->title,
            'summary' => $legends->excerpt ?? $legends->content,
            'full_content' => $legends->content,
            'image' => $legends->featured_image ?? '/images/default-legend.jpg',
            'category' => $legends->category->name ?? 'Sem Categoria',
            'origin' => $legends->location ?? 'Brasil',
            'danger_level' => $legends->danger_level ?? 'Baixo',
            'published_date' => $legends->published_at ? $legends->published_at->format('Y-m-d') : $legends->created_at->format('Y-m-d'),
            'tags' => $legends->tags->pluck('name')->toArray()
        ];

        return view('urban-legends.show', compact('legend'));
    }
}
