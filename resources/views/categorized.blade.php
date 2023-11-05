@extends('layouts.master')


@section('content')
    @if (request()->has('q') &&  $category->title)
        <div class=" d-flex justify-content-between">
            <p class=" mb-2 fw-bold">
                Search Result by ' {{ request()->q }} and {{$category->title}} category '
            </p>
            <a href="{{ route('index') }}" class=" text-dark">See All</a>
        </div>
    @elseif($category->title)
        <div class=" d-flex justify-content-between">
            <p class=" mb-2 fw-bold">Show Result by ' {{ $category->title }} category '</p>
            <a href="{{ route('index') }}" class=" text-dark">See All</a>
        </div>
    @endif
    @forelse ($articles as $article)
        <div class="card mb-3">
            <div class="card-body">
                <h3>
                    <a href="{{ route('detail', $article->slug) }}"
                        class=" text-decoration-none text-dark">{{ $article->title }}</a>
                </h3>
                <div class=" mb-2">
                    <span class=" badge bg-dark">{{ $article->user->name }}</span>
                    <span class=" badge bg-dark">{{ $article->category->title ?? 'unknown' }}</span>
                    <span class=" badge bg-dark">{{ $article->created_at->format('d M Y') }}</span>
                </div>
                <div class=" mb-3">
                    {{ Str::words($article->description, 30, '.....') }}
                </div>
                <a href="{{ route('detail', $article->slug) }}" class=" btn btn-sm btn-dark">see more</a>
            </div>
        </div>
    @empty
        <div class="card">
            <div class="card-body text-center">
                <h3>You can create article</h3>
                <a href="{{ route('register') }}" class=" btn btn-outline-dark ">Try now</a>
            </div>
        </div>
    @endforelse
    <div class="">
        {{ $articles->OnEachSide(1)->links() }}
    </div>
@endsection
