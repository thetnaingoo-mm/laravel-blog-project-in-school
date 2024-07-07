{{--  @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>

                    @endif

                    {{ __('You are logged in!') }}
                    <i class=" bi bi-person"></i>
                    <div class="alert alert-danger">
                        {{Auth::user()}}
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection  --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div class="container-fluid">
		<div class="row g-0">	<!-- Wrapper -->

			@include('page.nav')

			<main class="col-10 bg-light-subtle"> <!-- Main (Top Nav & Content) -->

				@include('page.header')

				<div class="container-fluid mt-3 p-4"> <!-- Content -->



					<div class="row flex-column flex-lg-row"> <!-- Content Row 1 -->
						@yield('content')
					</div> <!-- Content Row 1 -->


				</div> <!-- Content -->

			</main> <!-- Main (Nav & Content) -->

		</div> <!-- Wrapper -->

		<footer class="text-center py-4 text-muted">
			&copy; Copyright 2020
		</footer>
	</div>
</body>

</html>
