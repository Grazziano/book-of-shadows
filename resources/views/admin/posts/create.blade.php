@extends('layouts.admin')

@section('title', 'Criar Novo Post')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
@endsection

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>
            @if(isset($type) && $type === 'horror')
                <i class="fas fa-ghost me-2"></i> Criar Novo Conto de Terror
            @elseif(isset($type) && $type === 'legend')
                <i class="fas fa-eye me-2"></i> Criar Nova Lenda Urbana
            @else
                Criar Novo Post
            @endif
        </h1>
        <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Voltar
        </a>
    </div>

    @if(isset($type))
        <div class="alert alert-info mb-4">
            <i class="fas fa-info-circle me-2"></i>
            @if($type === 'horror')
                Você está criando um <strong>Conto de Terror</strong>. Este post aparecerá na seção de Contos de Terror do site.
            @elseif($type === 'legend')
                Você está criando uma <strong>Lenda Urbana</strong>. Este post aparecerá na seção de Lendas Urbanas do site.
            @endif
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">
                @if(isset($type) && $type === 'horror')
                    Informações do Conto de Terror
                @elseif(isset($type) && $type === 'legend')
                    Informações da Lenda Urbana
                @else
                    Informações do Post
                @endif
            </h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                @if(isset($type))
                    <input type="hidden" name="post_type" value="{{ $type }}">
                @endif
                
                <div class="mb-3">
                    <label for="title" class="form-label">
                        @if(isset($type) && $type === 'horror')
                            Título do Conto *
                        @elseif(isset($type) && $type === 'legend')
                            Nome da Lenda *
                        @else
                            Título *
                        @endif
                    </label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required
                           @if(isset($type) && $type === 'horror')
                               placeholder="Ex: A Casa Assombrada da Rua das Flores"
                           @elseif(isset($type) && $type === 'legend')
                               placeholder="Ex: O Homem do Saco"
                           @endif>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="excerpt" class="form-label">
                        @if(isset($type) && $type === 'horror')
                            Resumo da História
                        @elseif(isset($type) && $type === 'legend')
                            Resumo da Lenda
                        @else
                            Resumo
                        @endif
                    </label>
                    <textarea class="form-control @error('excerpt') is-invalid @enderror" id="excerpt" name="excerpt" rows="3"
                              @if(isset($type) && $type === 'horror')
                                  placeholder="Descreva brevemente o que acontece neste conto de terror..."
                              @elseif(isset($type) && $type === 'legend')
                                  placeholder="Descreva brevemente esta lenda urbana..."
                              @endif>{{ old('excerpt') }}</textarea>
                    @error('excerpt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="mb-3">
                    <label for="content" class="form-label">
                        @if(isset($type) && $type === 'horror')
                            História Completa *
                        @elseif(isset($type) && $type === 'legend')
                            Descrição Completa da Lenda *
                        @else
                            Conteúdo *
                        @endif
                    </label>
                    <textarea class="form-control summernote @error('content') is-invalid @enderror" id="content" name="content" rows="10" required>{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="category_id" class="form-label">Categoria *</label>
                        <select class="form-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" required>
                            <option value="">Selecione uma categoria</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" 
                                    {{ (old('category_id') == $category->id) || (isset($preselectedCategory) && $preselectedCategory && $preselectedCategory->id == $category->id) ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        @if(isset($type))
                            <div class="form-text">
                                @if($type === 'horror')
                                    Categoria sugerida para contos de terror foi pré-selecionada.
                                @elseif($type === 'legend')
                                    Categoria sugerida para lendas urbanas foi pré-selecionada.
                                @endif
                            </div>
                        @endif
                    </div>
                    
                    <div class="col-md-6 mb-3">
                        <label for="status" class="form-label">Status *</label>
                        <select class="form-select @error('status') is-invalid @enderror" id="status" name="status" required>
                            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Rascunho</option>
                            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Publicado</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                
                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <select class="form-select @error('tags') is-invalid @enderror" id="tags" name="tags[]" multiple>
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" {{ (is_array(old('tags')) && in_array($tag->id, old('tags'))) ? 'selected' : '' }}>
                                {{ $tag->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('tags')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-text">Segure Ctrl (ou Cmd) para selecionar múltiplas tags</div>
                </div>
                
                <div class="mb-3">
                    <label for="featured_image" class="form-label">Imagem Destacada</label>
                    <input type="file" class="form-control @error('featured_image') is-invalid @enderror" id="featured_image" name="featured_image">
                    @error('featured_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Salvar Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script>
    $(document).ready(function() {
        $('.summernote').summernote({
            height: 300,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture']],
                ['view', ['fullscreen', 'codeview', 'help']]
            ]
        });
    });
</script>
@endsection