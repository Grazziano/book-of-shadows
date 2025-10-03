@extends('layouts.admin')

@section('title', 'Visualizar Categoria')

@section('content')
<div class="container-fluid py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Visualizar Categoria</h1>
        <div>
            <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning me-2">
                <i class="fas fa-edit me-1"></i> Editar
            </a>
            <a href="{{ route('admin.categories.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Voltar
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informações da Categoria</h6>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Nome:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $category->name }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Slug:</strong>
                        </div>
                        <div class="col-sm-9">
                            <code>{{ $category->slug }}</code>
                        </div>
                    </div>
                    
                    @if($category->description)
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Descrição:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $category->description }}
                        </div>
                    </div>
                    @endif
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Data de Criação:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $category->created_at->format('d/m/Y H:i:s') }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-sm-3">
                            <strong>Última Atualização:</strong>
                        </div>
                        <div class="col-sm-9">
                            {{ $category->updated_at->format('d/m/Y H:i:s') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            @if($category->image)
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Imagem da Categoria</h6>
                </div>
                <div class="card-body text-center">
                    <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}" class="img-fluid rounded shadow">
                </div>
            </div>
            @endif
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Estatísticas</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-12 mb-3">
                            <div class="h4 mb-0 font-weight-bold text-primary">
                                {{ $category->posts()->count() }}
                            </div>
                            <div class="text-xs font-weight-bold text-gray-500 text-uppercase">
                                Posts Associados
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ações Rápidas</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning">
                            <i class="fas fa-edit me-1"></i> Editar Categoria
                        </a>
                        <a href="{{ route('admin.posts.index', ['category' => $category->id]) }}" class="btn btn-info">
                            <i class="fas fa-newspaper me-1"></i> Ver Posts desta Categoria
                        </a>
                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100" onclick="return confirm('Tem certeza que deseja excluir esta categoria? Esta ação não pode ser desfeita.')">
                                <i class="fas fa-trash me-1"></i> Excluir Categoria
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    @if($category->posts()->count() > 0)
    <div class="row mt-4">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Posts desta Categoria</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Título</th>
                                    <th>Status</th>
                                    <th>Data de Criação</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category->posts()->latest()->limit(10)->get() as $post)
                                <tr>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        @if ($post->status == 'published')
                                            <span class="badge bg-success">Publicado</span>
                                        @else
                                            <span class="badge bg-secondary">Rascunho</span>
                                        @endif
                                    </td>
                                    <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
                                    <td>
                                        <a href="{{ route('admin.posts.show', $post->id) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    @if($category->posts()->count() > 10)
                    <div class="text-center mt-3">
                        <a href="{{ route('admin.posts.index', ['category' => $category->id]) }}" class="btn btn-outline-primary">
                            Ver todos os {{ $category->posts()->count() }} posts desta categoria
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
@endsection