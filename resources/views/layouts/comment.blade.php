@forelse ($article->comment()->whereNull('parent_id')->latest('id')->get() as $comment)
    <div class=" card mb-3">
        <div class="card-body">
            <p class="mb-0">
                <i class="bi bi-chat-right-text-fill me-2"></i>{{ $comment->content }}
            </p>
            <div class="">
                <span class=" badge bg-dark">
                    <i class=" bi bi-person"></i> {{ $comment->user->name }}
                </span>
                <span class=" badge bg-dark">
                    <i class=" bi bi-clock"></i> {{ $comment->created_at->diffForHumans() }}
                </span>

                @can('delete', $comment)
                    <form action="{{ route('comment.destroy', $comment->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('delete')
                        <button class=" badge border-0 bg-dark">
                            <i class=" bi bi-trash3"></i> delete
                        </button>
                    </form>
                @endcan

                @auth
                    <span role="button" class=" badge bg-dark reply-btn user-select-none">
                        <i class=" bi bi-reply"></i> Reply
                    </span>
                    <form action="{{ route('comment.store') }}" class="ms-3 mt-2 d-none" method="POST">
                        @csrf
                        <input type="hidden" name="parent_id" value="{{ $comment->id }}">
                        <input type="hidden" name="article_id" value="{{ $article->id }}">
                        <textarea name="content" rows="2" class="form-control mb-2"
                            placeholder="Reply to {{ $comment->user->name }}'s comment ..."></textarea>
                        <div class=" d-flex justify-content-between align-items-end">
                            <p class=" mb-0">Reply as {{ Auth::user()->name }}</p>
                            <button class=" btn btn-sm btn-dark">Reply</button>
                        </div>
                    </form>

                    @foreach ($comment->replies()->latest('id')->get() as $reply)
                        <div class=" card mb-2 mt-2">
                            <div class="card-body">
                                <p class="mb-0">
                                    <i class="bi bi-reply me-2"></i>{{ $reply->content }}
                                </p>
                                <div class="">
                                    <span class=" badge bg-dark">
                                        <i class=" bi bi-person"></i> {{ $reply->user->name }}
                                    </span>
                                    <span class=" badge bg-dark">
                                        <i class=" bi bi-clock"></i> {{ $reply->created_at->diffForHumans() }}
                                    </span>

                                    @can('delete', $reply)
                                        <form action="{{ route('comment.destroy', $reply->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('delete')
                                            <button class=" badge border-0 bg-dark">
                                                <i class=" bi bi-trash3"></i> delete
                                            </button>
                                        </form>
                                    @endcan



                                </div>
                            </div>
                        </div>
                    @endforeach

                @endauth


            </div>
        </div>
    </div>
@empty
    <div class=" card mb-3">
        <div class="card-body">
            <p>Nothig comment yet !</p>
        </div>
    </div>
@endforelse

@auth

    <form action="{{ route('comment.store') }}" method="POST">
        @csrf
        <input type="hidden" name="article_id" value="{{ $article->id }}">
        <textarea name="content" rows="3" class="form-control mb-2" placeholder="Write a comment..."></textarea>
        <div class=" d-flex justify-content-between align-items-end">
            <p class=" mb-0">Comment as {{ Auth::user()->name }}</p>
            <button class=" btn btn-sm btn-dark">comment</button>
        </div>
    </form>

@endauth
@vite('resources/js/reply.js')
