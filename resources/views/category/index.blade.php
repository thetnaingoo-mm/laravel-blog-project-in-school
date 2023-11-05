@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                @if (session('message'))
                    <div class=" alert alert-info">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="">
                    <a href="{{ route('category.create') }}" class=" btn btn-dark">Category Create</a>
                </div>
                <div class=" d-flex justify-content-between">
                    <h1>Category Lists</h1>
                    <form action="{{ route('category.index') }}">

                        <div class=" input-group">
                            <input type="text" class=" form-control" name="q"
                                @if (request()->has('q')) value="{{ request()->q }}" @endif>
                            <button class=" btn btn-primary">Search</button>
                        </div>
                    </form>
                </div>
                <table class=" table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Title</td>
                            <td>Owner</td>
                            <td>Control</td>
                            <td>Created_at</td>
                            <td>Updated_at</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            <tr>
                                <td>{{ $category->id }}</td>
                                <td>
                                    {{ $category->title }}
                                    <br>
                                    <span class="small text-black-50">
                                        {{ Str::of($category->description)->limit(30) }}
                                    </span>

                                </td>
                                <td>{{ $category->user->name }}</td>

                                <td>
                                    <div class=" btn-group">

                                        @can('update', $category)
                                            <a href="{{ route('category.edit', $category->id) }}"
                                                class=" btn btn-sm btn-warning">
                                                <i class=" bi bi-pencil"></i>
                                            </a>
                                        @endcan
                                        @can('delete', $category)
                                            <button form="categoryDeleteFrom{{ $category->id }}" class=" btn btn-sm btn-danger">
                                                <i class=" bi bi-trash3"></i>
                                            </button>
                                        @endcan
                                    </div>
                                    <form id="categoryDeleteFrom{{ $category->id }}" class=" d-inline"
                                        action="{{ route('category.destroy', $category->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>
                                        {{ $category->created_at->format('h: i a') }}
                                    </p>
                                    <p class=" small mb-0 ">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $category->created_at->format('d M Y') }}
                                    </p>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>
                                        {{ $category->updated_at->format('h: i a') }}
                                    </p>
                                    <p class=" small mb-0 ">
                                        <i class=" bi bi-calendar"></i>
                                        {{ $category->updated_at->format('d M Y') }}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class=" text-center">
                                    Threre is no record <br>
                                    <a href=" {{ route('category.create') }}" class=" btn btn-sm btn-primary">Create
                                        Category</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
@endsection
