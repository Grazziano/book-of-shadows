@extends('layouts.admin')

@section('title', $post->title)

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>{{ $post->title }}</h1>
        <div>
            <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-info me-2">
                <i class="fas fa-edit me-1"></i> Editar
            </a>
            <a href="{{ route('admin.posts.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Voltar
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Conteúdo</h6>
                </div>
                <div class="card-body">
                    @if($post->featured_image)
                        <div class="text-center mb-4">
                            <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="img-fluid rounded" style="max-height: 400px">
                        </div>
                    @endif
                    
                    @if($post->excerpt)
                        <div class="mb-4">
                            <h5>Resumo</h5>
                            <p class="lead">{{ $post->excerpt }}</p>
                        </div>
                    @endif
                    
                    <div class="post-content">
                        {!! $post->content !!}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informações</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Status
                            @if($post->status == 'published')
                                <span class="badge bg-success">Publicado</span>
                            @else
                                <span class="badge bg-secondary">Rascunho</span>
                            @endif
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Categoria
                            <span>{{ $post->category->name ?? 'Sem categoria' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Autor
                            <span>{{ $post->user->name ?? 'Desconhecido' }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Criado em
                            <span>{{ $post->created_at->format('d/m/Y H:i') }}</span>
                        </li>
                        @if($post->published_at)
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Publicado em
                            <span>{{ $post->published_at->format('d/m/Y H:i') }}</span>
                        </li>
                        @endif
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Atualizado em
                            <span>{{ $post->updated_at->format('d/m/Y H:i') }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            @if($post->tags->count() > 0)
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tags</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap gap-2">
                        @foreach($post->tags as $tag)
                            <span class="badge bg-dark">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection