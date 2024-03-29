<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/11.6.0/highlight.min.js"></script>

    <title>{{ config('app.name', 'Social Mint Share') }}  @yield('title','')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
      
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="text-light appcolor">

    <div id="app" >
        <x-navbar/>
        <main class="py-4">
            @yield('content')
        </main>
    </div> 
   
    <script src="{{ asset('js/bootstrap.bundle.js') }}" defer ></script>
    
</body>
</html>
