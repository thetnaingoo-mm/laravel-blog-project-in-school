@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Create Category </h3>
                <form action="{{route('category.store')}}" method="post">
                    @csrf
                    <div class=" mb-3">
                        <label for="" class=" form-label">Category Title</label>
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
                        <button class=" btn btn-primary">Create Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
