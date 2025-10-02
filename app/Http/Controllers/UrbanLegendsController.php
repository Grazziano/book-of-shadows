<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UrbanLegendsController extends Controller
{
    public function index()
    {
        // Dados fictícios de lendas urbanas para demonstração
        $legends = [
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

        return view('urban-legends.index', compact('legends'));
    }
}
