<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crie sua Lenda - Book of Shadows</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Creepster&family=Nosifer&family=Butcherman&family=Crimson+Text:ital,wght@0,400;0,600;1,400&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-color: #1a0b2e;
            --secondary-color: #7209b7;
            --accent-color: #f72585;
            --text-color: #e0e0e0;
            --bg-dark: #0d0d0d;
            --card-bg: rgba(26, 11, 46, 0.8);
            --border-color: rgba(114, 9, 183, 0.3);
            --success-color: #28a745;
            --error-color: #dc3545;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Crimson Text', serif;
            background: linear-gradient(135deg, var(--bg-dark) 0%, var(--primary-color) 100%);
            color: var(--text-color);
            min-height: 100vh;
            line-height: 1.6;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        .header {
            text-align: center;
            margin-bottom: 3rem;
            animation: fadeInDown 1s ease-out;
        }

        .header h1 {
            font-family: 'Creepster', cursive;
            font-size: 3rem;
            color: var(--accent-color);
            text-shadow: 0 0 20px rgba(247, 37, 133, 0.5);
            margin-bottom: 1rem;
            animation: glow 2s ease-in-out infinite alternate;
        }

        .header p {
            font-size: 1.2rem;
            color: var(--text-color);
            opacity: 0.9;
        }

        @keyframes glow {
            from { text-shadow: 0 0 20px rgba(247, 37, 133, 0.5); }
            to { text-shadow: 0 0 30px rgba(247, 37, 133, 0.8), 0 0 40px rgba(247, 37, 133, 0.6); }
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-container {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 15px;
            padding: 2.5rem;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            animation: fadeInUp 1s ease-out 0.3s both;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            color: var(--text-color);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
            color: var(--secondary-color);
            font-size: 1.1rem;
        }

        input, select, textarea {
            width: 100%;
            padding: 0.8rem;
            border: 2px solid var(--border-color);
            border-radius: 8px;
            background: rgba(13, 13, 13, 0.8);
            color: var(--text-color);
            font-family: 'Crimson Text', serif;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: var(--secondary-color);
            box-shadow: 0 0 15px rgba(114, 9, 183, 0.3);
        }

        textarea {
            resize: vertical;
            min-height: 150px;
        }

        .danger-level {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .danger-stars {
            display: flex;
            gap: 0.2rem;
        }

        .star {
            font-size: 1.5rem;
            color: #666;
            cursor: pointer;
            transition: color 0.2s ease;
        }

        .star.active {
            color: var(--accent-color);
        }

        .btn-submit {
            background: linear-gradient(45deg, var(--secondary-color), var(--accent-color));
            color: white;
            border: none;
            padding: 1rem 2rem;
            border-radius: 8px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(114, 9, 183, 0.4);
        }

        .alert {
            padding: 1rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            animation: slideIn 0.5s ease-out;
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.2);
            border: 1px solid var(--success-color);
            color: var(--success-color);
        }

        .alert-error {
            background: rgba(220, 53, 69, 0.2);
            border: 1px solid var(--error-color);
            color: var(--error-color);
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .back-link {
            display: inline-block;
            margin-bottom: 2rem;
            /* color: var(--secondary-color); */
            color: var(--highlight-color);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .back-link:hover {
            color: var(--accent-color);
        }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .header h1 {
                font-size: 2rem;
            }

            .form-container {
                padding: 1.5rem;
            }

            .form-row {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    @include('components.header')

    <div class="container">
        <a href="/" class="back-link">← Voltar ao Início</a>

        <div class="header">
            <h1>Crie sua Lenda</h1>
            <p>Compartilhe sua história sombria com o mundo</p>
        </div>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-error">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-container">
            <form action="{{ route('store-legend') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="title">Título da Lenda *</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required>
                    </div>

                    <div class="form-group">
                        <label for="author">Seu Nome *</label>
                        <input type="text" id="author" name="author" value="{{ old('author') }}" required>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="location">Local da Lenda *</label>
                        <input type="text" id="location" name="location" value="{{ old('location') }}" placeholder="Ex: São Paulo, SP" required>
                    </div>

                    <div class="form-group">
                        <label for="category">Categoria *</label>
                        <select id="category" name="category" required>
                            <option value="">Selecione uma categoria</option>
                            <option value="urbana" {{ old('category') == 'urbana' ? 'selected' : '' }}>Urbana</option>
                            <option value="sobrenatural" {{ old('category') == 'sobrenatural' ? 'selected' : '' }}>Sobrenatural</option>
                            <option value="psicologica" {{ old('category') == 'psicologica' ? 'selected' : '' }}>Psicológica</option>
                            <option value="gotica" {{ old('category') == 'gotica' ? 'selected' : '' }}>Gótica</option>
                            <option value="folclorica" {{ old('category') == 'folclorica' ? 'selected' : '' }}>Folclórica</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label>Nível de Perigo *</label>
                    <div class="danger-level">
                        <span>Inofensivo</span>
                        <div class="danger-stars">
                            <span class="star" data-rating="1">★</span>
                            <span class="star" data-rating="2">★</span>
                            <span class="star" data-rating="3">★</span>
                            <span class="star" data-rating="4">★</span>
                            <span class="star" data-rating="5">★</span>
                        </div>
                        <span>Mortal</span>
                        <input type="hidden" id="danger_level" name="danger_level" value="{{ old('danger_level', 1) }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="content">Conte sua Lenda *</label>
                    <textarea id="content" name="content" placeholder="Descreva sua lenda urbana em detalhes. Seja criativo e assustador!" required>{{ old('content') }}</textarea>
                </div>

                <div class="form-group">
                    <label for="moral">Moral da História (opcional)</label>
                    <textarea id="moral" name="moral" placeholder="Qual é a lição ou aviso que sua lenda transmite?" style="min-height: 100px;">{{ old('moral') }}</textarea>
                </div>

                <button type="submit" class="btn-submit">Criar Minha Lenda</button>
            </form>
        </div>
    </div>

    <script>
        // Sistema de avaliação por estrelas
        const stars = document.querySelectorAll('.star');
        const dangerLevelInput = document.getElementById('danger_level');

        stars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = parseInt(this.dataset.rating);
                dangerLevelInput.value = rating;

                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
            });

            star.addEventListener('mouseover', function() {
                const rating = parseInt(this.dataset.rating);

                stars.forEach((s, index) => {
                    if (index < rating) {
                        s.style.color = 'var(--accent-color)';
                    } else {
                        s.style.color = '#666';
                    }
                });
            });
        });

        document.querySelector('.danger-stars').addEventListener('mouseleave', function() {
            const currentRating = parseInt(dangerLevelInput.value);

            stars.forEach((s, index) => {
                if (index < currentRating) {
                    s.style.color = 'var(--accent-color)';
                } else {
                    s.style.color = '#666';
                }
            });
        });

        // Definir rating inicial
        const initialRating = parseInt(dangerLevelInput.value) || 1;
        stars.forEach((s, index) => {
            if (index < initialRating) {
                s.classList.add('active');
            }
        });

        // Animação de entrada dos elementos do formulário
        const formGroups = document.querySelectorAll('.form-group');
        formGroups.forEach((group, index) => {
            group.style.opacity = '0';
            group.style.transform = 'translateY(20px)';

            setTimeout(() => {
                group.style.transition = 'all 0.5s ease';
                group.style.opacity = '1';
                group.style.transform = 'translateY(0)';
            }, 100 * index);
        });
    </script>
</body>
</html>
