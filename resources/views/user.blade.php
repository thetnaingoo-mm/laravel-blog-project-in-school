@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">


                    <h1>User Lists</h1>

                <table class=" table">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Information</td>
                            <td>Category Count</td>
                            <td>Article Count</td>
                            <td>Control</td>
                            <td>Created_at</td>
                            <td>Updated_at</td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>
                                    {{ $user->name }}
                                    <br>
                                    <span class="small text-black-50">
                                        {{ $user->email }}
                                    </span>
                                </td>
                                <td>{{ $user->categories->count()}}</td>
                                <td>{{ $user->articles->count()}}</td>
                                <td></td>
                                <td>

                                </td>

                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>
                                        {{$user->created_at->format("h: i a")}}
                                    </p>
                                    <p class=" small mb-0 ">
                                        <i class=" bi bi-calendar"></i>
                                        {{$user->created_at->format("d M Y")}}
                                    </p>
                                </td>
                                <td>
                                    <p class=" small mb-0">
                                        <i class=" bi bi-clock"></i>
                                        {{$user->updated_at->format("h: i a")}}
                                    </p>
                                    <p class=" small mb-0 ">
                                        <i class=" bi bi-calendar"></i>
                                        {{$user->updated_at->format("d M Y")}}
                                    </p>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class=" text-center">
                                    Threre is no record <br>
                                    <a href=" {{ route('user.create') }}" class=" btn btn-sm btn-primary">Create Category</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{$users->OnEachSide(1)->links()}}
            </div>
        </div>
    </div>
@endsection
