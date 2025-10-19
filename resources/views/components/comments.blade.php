@php
    /** @var string $targetType */
    /** @var int $targetId */
    /** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Comment[] $comments */
@endphp

<div id="comments" class="comments-section">
    <h2 class="section-title">Comentários</h2>

    @auth
        <form action="{{ route('comments.store') }}" method="POST" class="comment-form">
            @csrf
            <input type="hidden" name="target_type" value="{{ $targetType }}">
            <input type="hidden" name="target_id" value="{{ $targetId }}">

            <textarea name="content" rows="4" placeholder="Escreva seu comentário..." required></textarea>

            @error('content')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn-primary">Publicar comentário</button>
        </form>
    @else
        <p class="login-notice">Faça <a href="{{ route('login') }}">login</a> para comentar.</p>
    @endauth

    <div class="comment-list">
        @forelse($comments as $comment)
            <div class="comment-item">
                <div class="comment-header">
                    <span class="author">{{ $comment->user->name ?? 'Usuário' }}</span>
                    <span class="date">{{ $comment->created_at->format('d/m/Y H:i') }}</span>
                </div>
                <p class="content">{{ $comment->content }}</p>
            </div>
        @empty
            <p class="empty-state">Seja o primeiro a comentar.</p>
        @endforelse
    </div>
</div>

<style>
    .comments-section {
        margin-top: 2rem;
        background: rgba(0, 0, 0, 0.4);
        padding: 1.5rem;
        border-radius: 12px;
    }

    .comments-section .section-title {
        font-size: 1.5rem;
        color: var(--accent-color, #c678dd);
        margin-bottom: 1rem;
    }

    .comment-form textarea {
        width: 100%;
        resize: vertical;
        padding: 0.75rem;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        background: rgba(0, 0, 0, 0.3);
        color: #fff;
    }

    .comment-form .btn-primary {
        margin-top: 0.75rem;
    }

    .login-notice a {
        color: var(--accent-color, #c678dd);
    }

    .comment-list {
        display: grid;
        gap: 1rem;
        margin-top: 1rem;
    }

    .comment-item {
        background: rgba(0, 0, 0, 0.3);
        padding: 0.75rem 1rem;
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .comment-header {
        display: flex;
        justify-content: space-between;
        font-size: 0.9rem;
        color: rgba(255, 255, 255, 0.8);
        margin-bottom: 0.5rem;
    }

    .comment-item .content {
        line-height: 1.5;
    }

    .error {
        color: #ff6b6b;
        margin-top: 0.5rem;
    }

    .empty-state {
        color: rgba(255, 255, 255, 0.7);
    }
</style>
