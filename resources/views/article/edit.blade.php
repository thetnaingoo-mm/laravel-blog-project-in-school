@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Update Article </h3>
                <form action="{{route('article.update',$article->id)}}" method="post">
                    @csrf
                    @method('put')
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
                            {{old('category',$article->category_id) == $category->id ? 'selected' : ''}} >
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
                            value="{{old('title',$article->title)}}"
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
                        <textarea name="description"
                            class="form-control @error('description')
                            is-invalid
                            @enderror" rows="5">{{old('description',$article->description)}}</textarea>
                            @error('description')
                                <div class=" invalid-feedback">{{ $message }}</div>
                            @enderror
                    </div>

                    <div class=" mb-3">
                        <button class=" btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
