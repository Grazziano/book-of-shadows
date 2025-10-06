<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Review - Book of Shadows</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #e0e0e0;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        .form-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .form-header h1 {
            font-size: 2.5rem;
            color: #ff6b6b;
            margin-bottom: 0.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }

        .form-header p {
            color: #b0b0b0;
            font-size: 1.1rem;
        }

        .form-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 2.5rem;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            color: #ff6b6b;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 8px;
            background: rgba(255, 255, 255, 0.1);
            color: #e0e0e0;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #ff6b6b;
            box-shadow: 0 0 0 2px rgba(255, 107, 107, 0.2);
            background: rgba(255, 255, 255, 0.15);
        }

        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }

        .form-group.content textarea {
            min-height: 200px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 1rem;
        }

        .checkbox-group input[type="checkbox"] {
            width: auto;
            margin: 0;
        }

        .btn-group {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 2rem;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6b6b, #ee5a52);
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #ee5a52, #ff6b6b);
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(255, 107, 107, 0.3);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: #e0e0e0;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        .error-message {
            color: #ff6b6b;
            font-size: 0.8rem;
            margin-top: 0.25rem;
        }

        .success-message {
            background: rgba(76, 175, 80, 0.2);
            color: #4caf50;
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(76, 175, 80, 0.3);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .btn-group {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    @include('components.header')

    <div class="container">
        <div class="form-header">
            <h1>Criar Nova Review</h1>
            <p>Compartilhe sua opinião sobre filmes, livros e séries</p>
        </div>

        @if(session('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif

        <div class="form-container">
            <form action="{{ route('reviews.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="title">Título *</label>
                    <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                    @error('title')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="type">Tipo *</label>
                        <select id="type" name="type" required>
                            <option value="">Selecione o tipo</option>
                            <option value="movie" {{ old('type') == 'movie' ? 'selected' : '' }}>Filme</option>
                            <option value="book" {{ old('type') == 'book' ? 'selected' : '' }}>Livro</option>
                            <option value="series" {{ old('type') == 'series' ? 'selected' : '' }}>Série</option>
                        </select>
                        @error('type')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="author_director">Autor/Diretor</label>
                        <input type="text" id="author_director" name="author_director" value="{{ old('author_director') }}">
                        @error('author_director')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="release_year">Ano de Lançamento</label>
                        <input type="number" id="release_year" name="release_year" value="{{ old('release_year') }}" min="1900" max="{{ date('Y') + 5 }}">
                        @error('release_year')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="genre">Gênero</label>
                        <input type="text" id="genre" name="genre" value="{{ old('genre') }}">
                        @error('genre')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="rating">Avaliação (0-10)</label>
                        <input type="number" id="rating" name="rating" value="{{ old('rating') }}" min="0" max="10" step="0.1">
                        @error('rating')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="status">Status *</label>
                        <select id="status" name="status" required>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Rascunho</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Publicado</option>
                        </select>
                        @error('status')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="image_url">URL da Imagem</label>
                        <input type="url" id="image_url" name="image_url" value="{{ old('image_url') }}">
                        @error('image_url')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="trailer_url">URL do Trailer</label>
                        <input type="url" id="trailer_url" name="trailer_url" value="{{ old('trailer_url') }}">
                        @error('trailer_url')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="summary">Resumo</label>
                    <textarea id="summary" name="summary" placeholder="Breve resumo da obra...">{{ old('summary') }}</textarea>
                    @error('summary')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group content">
                    <label for="content">Conteúdo da Review *</label>
                    <textarea id="content" name="content" placeholder="Escreva sua review completa aqui..." required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="is_featured" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}>
                    <label for="is_featured">Marcar como destaque</label>
                </div>

                <div class="btn-group">
                    <a href="{{ route('reviews.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Criar Review</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>