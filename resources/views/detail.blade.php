@extends('layouts.master')


@section('content')
    <h3>
        <a href="" class=" text-decoration-none text-dark">{{ $article->title }}</a>
    </h3>
    <div class=" mb-2">
        <span class=" badge bg-dark">{{ $article->user->name }}</span>
        <span class=" badge bg-dark">{{ $article->category->title ?? 'unknown' }}</span>
        <span class=" badge bg-dark">{{ $article->created_at->format('d M Y') }}</span>
    </div>
    <div class=" mb-3">
        {{ $article->description }}
    </div>

    <div class="comment">
        <h4>Comment and Reply</h4>

        @include('layouts.comment')
    </div>
@endsection
