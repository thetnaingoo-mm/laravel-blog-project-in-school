@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                    <div class=" alert alert-info">
                        {{session('message')}}
                    </div>
                @endif
                <div class="">
                    <a href="{{route('article.create')}}" class=" btn btn-dark">Article Create</a>
                </div>
                <div class=" d-flex justify-content-between">
                    <h1>Article Lists</h1>
                    <form action="{{route('article.index')}}" >

                        <div class=" input-group">
                            <input type="text" class=" form-control" name="q" @if (request()->has('q'))
                            value="{{request()->q}}"
                            @endif>
                            <button class=" btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <table class=" table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Title</td>
                            @can('admin-only')
                            <td>Owner</td>
                            @endcan
                            <td>Category</td>
                            <td>Control</td>
                            <td>Created_at</td>
                            <td>Updated_at</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($articles as $article)
                            <tr>
                                <td>{{ $article->id }}</td>
                                <td>
                                    {{ $article->title }}
                                    <br>
                                    <span class="small text-black-50">
                                        {{ Str::of($article->description)->limit(30) }}
                                    </span>

                                </td>
                                @can('admin-only')
                                <td>{{ $article->user->name}}</td>
                                @endcan
                                <td>{{$article->category->title ?? 'unknown' }}</td>

                                <td>
                                    <div class=" btn-group">
                                        <a href="{{ route('article.show',$article->id) }}" class=" btn btn-sm btn-primary">
                                            <i class=" bi bi-info"></i>
                                        </a>
                                        @can(['delete','update'],$article)
                                        <a href="{{ route('article.edit',$article->id) }}" class=" btn btn-sm btn-warning">
                                            <i class=" bi bi-pencil"></i>
                                        </a>
                                        <button form="articleDeleteFrom{{$article->id}}" class=" btn btn-sm btn-danger">
                                            <i class=" bi bi-trash3"></i>
                                        </button>
                                        @endcan
                                    </div>
                                    <form id="articleDeleteFrom{{$article->id}}" class=" d-inline" action="{{ route('article.destroy',$article->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>
                                        {{$article->created_at->format("h: i a")}}
                                    </p>
                                    <p class=" small mb-0 ">
                                        <i class=" bi bi-calendar"></i>
                                        {{$article->created_at->format("d M Y")}}
                                    </p>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>
                                        {{$article->updated_at->format("h: i a")}}
                                    </p>
                                    <p class=" small mb-0 ">
                                        <i class=" bi bi-calendar"></i>
                                        {{$article->updated_at->format("d M Y")}}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class=" text-center">
                                    Threre is no record <br>
                                    <a href=" {{ route('article.create') }}" class=" btn btn-sm btn-primary">Create Article</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$articles->OnEachSide(1)->links()}}
            </div>
        </div>
    </div>
@endsection
