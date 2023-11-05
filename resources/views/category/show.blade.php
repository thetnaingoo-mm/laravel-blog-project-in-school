@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h4>Article Detail</h4>
                <table class=" table">
                    <tr>
                        <td>No</td>
                        <td>{{ $article->id }}</td>
                    </tr>
                    <tr>
                        <td>Owner</td>
                        <td>{{ $article->user_id }}</td>
                    </tr>
                    <tr>
                        <td>Title</td>
                        <td>{{ $article->title }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $article->description }}</td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
@endsection
