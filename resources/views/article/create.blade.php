@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Create Article </h3>
                <form action="{{route('article.store')}}" method="post">
                    @csrf
                    <div class=" mb-3">
                        <label for="" class=" form-label">Selcect Category</label>
                        <select
                        class=" form-select @error('category')
                            is-invalid
                            @enderror"
                        name="category">
                        @foreach (App\Models\Category::all() as $category)
                            <option
                            value="{{$category->id}}"
                            {{old('category') == $category->id ? 'selected' : ''}} >
                            {{$category->title}}
                        </option>
                        @endforeach
                        </select>
                            @error('category')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>
                    <div class=" mb-3">
                        <label for="" class=" form-label">Article Title</label>
                        <input type="text"
                            class=" form-control @error('title')
                                is-invalid
                                @enderror"
                            name="title">
                            @error('title')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class=" mb-3">
                        <label for="" class=" form-label">Description</label>
                        <textarea name="description" id=""
                            class="form-control @error('description')
                            is-invalid
                            @enderror" rows="5"></textarea>
                            @error('description')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class=" mb-3">
                        <button class=" btn btn-primary">Create Article</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
