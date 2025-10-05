<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Story;
use App\Models\Legend;

class MacabreNewsletterController extends Controller
{
    /**
     * Exibe a página do Boletim Macabro
     */
    public function index()
    {
        // Buscar posts reais das três tabelas
        $posts = Post::with('user', 'category')
            ->published()
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        $stories = Story::with('user')
            ->published()
            ->orderBy('published_at', 'desc')
            ->limit(3)
            ->get();

        $legends = Legend::published()
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        // Combinar todos os posts em uma única coleção
        $allPosts = collect();
        
        // Adicionar posts
        foreach ($posts as $post) {
            $allPosts->push([
                'id' => $post->id,
                'title' => $post->title,
                'summary' => $post->excerpt ?? substr(strip_tags($post->content), 0, 150) . '...',
                'date' => $post->published_at->format('d/m/Y'),
                'category' => $post->category->name ?? 'Geral',
                'author' => $post->user->name ?? 'Autor Desconhecido',
                'type' => 'post',
                'urgency' => $this->determineUrgency($post->category->name ?? 'Geral'),
                'published_at' => $post->published_at,
                'url' => route('posts.show', $post->id)
            ]);
        }

        // Adicionar stories
        foreach ($stories as $story) {
            $allPosts->push([
                'id' => $story->id,
                'title' => $story->title,
                'summary' => $story->excerpt ?? substr(strip_tags($story->content), 0, 150) . '...',
                'date' => $story->published_at->format('d/m/Y'),
                'category' => ucfirst($story->category) . ' (Conto)',
                'author' => $story->author ?? $story->user->name ?? 'Autor Desconhecido',
                'type' => 'story',
                'urgency' => $this->determineUrgency($story->category),
                'published_at' => $story->published_at,
                'url' => route('horror-stories.show', $story->id)
            ]);
        }

        // Adicionar legends
        foreach ($legends as $legend) {
            $allPosts->push([
                'id' => $legend->id,
                'title' => $legend->title,
                'summary' => substr(strip_tags($legend->content), 0, 150) . '...',
                'date' => $legend->created_at->format('d/m/Y'),
                'category' => ucfirst($legend->category) . ' (Lenda)',
                'author' => $legend->author ?? 'Autor Desconhecido',
                'type' => 'legend',
                'urgency' => $this->determineUrgency($legend->category),
                'published_at' => $legend->created_at,
                'url' => route('urban-legends.show', $legend->id)
            ]);
        }

        // Ordenar por data de publicação (mais recente primeiro)
        $allPosts = $allPosts->sortByDesc('published_at')->take(6);

        // Selecionar o post em destaque (mais recente)
        $featuredArticle = $allPosts->first();

        // Remover o post em destaque da lista de artigos
        $articles = $allPosts->skip(1)->values();

        $newsletter = [
            'edition' => 'Edição #' . date('W') . ' - ' . date('F Y'),
            'featured_article' => $featuredArticle ? [
                'title' => $featuredArticle['title'],
                'summary' => $featuredArticle['summary'],
                'image' => '/images/haunted-mansion-hero.jpg',
                'date' => $featuredArticle['date'],
                'category' => $featuredArticle['category'],
                'author' => $featuredArticle['author']
            ] : [
                'title' => 'Nenhum post encontrado',
                'summary' => 'Ainda não há posts publicados no sistema.',
                'image' => '/images/haunted-mansion-hero.jpg',
                'date' => date('d/m/Y'),
                'category' => 'Sistema',
                'author' => 'Boletim Macabro'
            ],
            'articles' => $articles->toArray(),
            'weather_forecast' => [
                'condition' => 'Névoa Densa com Possibilidade de Aparições',
                'temperature' => '13°C',
                'warning' => 'Evite sair após a meia-noite. Atividade paranormal em alta.'
            ],
            'subscription_count' => '6.666'
        ];

        return view('macabre-newsletter.index', compact('newsletter'));
    }

    /**
     * Determina o nível de urgência baseado na categoria
     */
    private function determineUrgency($category)
    {
        $category = strtolower($category);
        
        if (in_array($category, ['terror', 'horror', 'crítica'])) {
            return 'crítica';
        } elseif (in_array($category, ['suspense', 'psicológico', 'alta'])) {
            return 'alta';
        } elseif (in_array($category, ['sobrenatural', 'gótico', 'média'])) {
            return 'média';
        } else {
            return 'baixa';
        }
    }
}
