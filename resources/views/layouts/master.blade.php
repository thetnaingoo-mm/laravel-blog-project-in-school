<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app" class="min-vh-100 d-flex flex-column">

        @include('layouts.nav')


            <main class="py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            @yield('content')
                        </div>
                        <div class="col-lg-4">
                            @include('layouts.right-sidebar')
                        </div>
                    </div>
                </div>
            </main>

            <footer class=" bg-black text-center py-5 mt-auto" >
                <p class="mb-0 text-white">Footer</p>
            </footer>
    </div>
</body>
</html>
