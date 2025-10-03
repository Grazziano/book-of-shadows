<?php

namespace App\Http\Controllers;

use App\Models\Legend;
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

        try {
            // Cria uma nova lenda no banco de dados
            Legend::create($validated);

            return redirect()->route('create-legend')->with('success', 'Sua lenda foi criada com sucesso! Obrigado por compartilhar sua história conosco.');
        } catch (\Exception $e) {
            return redirect()->route('create-legend')
                ->withInput()
                ->with('error', 'Ocorreu um erro ao salvar sua lenda. Tente novamente.');
        }
    }
}
