<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Boolpress') }}</title> --}}
    <title>@yield('title', 'Bollywood')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    @include('partials.header')
    <main >
        @yield('content')
    </main>
    @include('partials.footer')
</body>

</html>


<style lang="scss" scoped>
body{
    color: white;
    background-image: url(https://www.marmomac.com/wp-content/uploads/2022/08/Marmo-Portoro-copertina-1024x683.jpg)
}
</style>