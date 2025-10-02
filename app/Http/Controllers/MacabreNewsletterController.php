<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MacabreNewsletterController extends Controller
{
    /**
     * Exibe a página do Boletim Macabro
     */
    public function index()
    {
        // Dados fictícios para o boletim macabro
        $newsletter = [
            'edition' => 'Edição #13 - Outubro 2025',
            'featured_article' => [
                'title' => 'O Mistério da Casa Abandonada na Rua das Flores',
                'summary' => 'Moradores relatam aparições estranhas e sons inexplicáveis vindos da propriedade que está vazia há 20 anos.',
                'image' => '/images/haunted-mansion-hero.jpg',
                'date' => '28 de Outubro, 2025',
                'category' => 'Investigação Paranormal'
            ],
            'articles' => [
                [
                    'title' => 'Avistamentos de Criaturas Sombrias Aumentam na Cidade',
                    'summary' => 'Relatórios de figuras encapuzadas vagando pelas ruas durante a madrugada preocupam autoridades locais.',
                    'date' => '27 de Outubro, 2025',
                    'category' => 'Fenômenos Urbanos',
                    'urgency' => 'alta'
                ],
                [
                    'title' => 'Cemitério Municipal: Túmulos Violados Misteriosamente',
                    'summary' => 'Funcionários descobrem sepulturas abertas sem sinais de vandalismo convencional. Investigação em andamento.',
                    'date' => '26 de Outubro, 2025',
                    'category' => 'Crime Sobrenatural',
                    'urgency' => 'crítica'
                ],
                [
                    'title' => 'Biblioteca Antiga: Livros se Movem Sozinhos',
                    'summary' => 'Bibliotecários relatam volumes que mudam de lugar durante a noite, sempre retornando à seção de ocultismo.',
                    'date' => '25 de Outubro, 2025',
                    'category' => 'Atividade Paranormal',
                    'urgency' => 'média'
                ],
                [
                    'title' => 'Desaparecimentos Inexplicáveis na Floresta Sombria',
                    'summary' => 'Três pessoas desapareceram na última semana. Equipes de busca encontram apenas pegadas que terminam abruptamente.',
                    'date' => '24 de Outubro, 2025',
                    'category' => 'Desaparecimentos',
                    'urgency' => 'crítica'
                ],
                [
                    'title' => 'Fenômenos Elétricos Anômalos no Centro da Cidade',
                    'summary' => 'Luzes piscam em padrões estranhos e aparelhos eletrônicos apresentam comportamento bizarro sem explicação técnica.',
                    'date' => '23 de Outubro, 2025',
                    'category' => 'Anomalias Tecnológicas',
                    'urgency' => 'média'
                ],
                [
                    'title' => 'Ritual Antigo Descoberto em Porão de Casa Colonial',
                    'summary' => 'Símbolos esculpidos em pedra e restos de velas sugerem práticas ocultas realizadas há décadas.',
                    'date' => '22 de Outubro, 2025',
                    'category' => 'Arqueologia Sombria',
                    'urgency' => 'baixa'
                ]
            ],
            'weather_forecast' => [
                'condition' => 'Névoa Densa com Possibilidade de Aparições',
                'temperature' => '13°C',
                'warning' => 'Evite sair após a meia-noite. Atividade paranormal em alta.'
            ],
            'subscription_count' => '6.666'
        ];

        return view('macabre-newsletter.index', compact('newsletter'));
    }
}
