<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CreateLegendController extends Controller
{
    /**
     * Exibe o formulário para criar uma nova lenda
     */
    public function create()
    {
        return view('create-legend.create');
    }

    /**
     * Armazena uma nova lenda criada pelo usuário
     */
    public function store(Request $request)
    {
        // Validação dos dados do formulário
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'category' => 'required|string|in:urbana,sobrenatural,psicologica,gotica,folclorica',
            'danger_level' => 'required|integer|min:1|max:5',
            'content' => 'required|string|min:100',
            'moral' => 'nullable|string|max:500',
        ]);

        // Por enquanto, apenas retorna uma mensagem de sucesso
        // Em uma implementação real, salvaria no banco de dados
        return redirect()->route('create-legend')->with('success', 'Sua lenda foi criada com sucesso! Obrigado por compartilhar sua história conosco.');
    }
}
